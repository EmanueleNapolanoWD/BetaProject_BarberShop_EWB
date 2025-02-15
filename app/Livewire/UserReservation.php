<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class UserReservation extends Component
{
    #[Validate('required|min:3|max:50')]
    public $name;
    #[Validate('required|min:3|max:11')]
    public $cellphone;
    #[Validate('required|min:3|max:50')]
    public $email;
    public $user_id;
    public $service_id;
    public $employee_id;
    public $employees;
    public $appointment_date;
    public $appointment_time;
    public $appointment_date_from_employee;
    public $appointment_time_from_employee;
    public $appointment;
    public $user;
    public $hours;

    public function mouth()
    {
        $hours = [];
        $start = Carbon::createFromTime(8, 0); // 08:00
        $end = Carbon::createFromTime(19, 0); // 19:00
        while ($start <= $end) {
            $hours[] = $start->format('H:i');
            $start->addMinutes(30);
        }
    }


    public function store()
    {
        if (Auth::check()) {
            $this->user_id = Auth::user()->id;
            $this->name =  Auth::user()->name;
            $this->cellphone = Auth::user()->cellphone;
            $this->email = Auth::user()->email;

            if (Auth::user()->role == 'employee') {

                $this->employee_id = Auth::user()->employee->id;
                $this->appointment_date = $this->appointment_date_from_employee;
                $this->appointment_time = $this->appointment_time_from_employee;
            }
        }

        $start_time = Carbon::createFromFormat('H:i', $this->appointment_time);
        $service = Service::find($this->service_id);
        $end_time = $start_time->copy()->addMinutes($service->duration);

        if (!$service) {
            session()->flash('error', 'Servizio non valido.');
            return;
        }

        // Controlla sovrapposizione
        $overlap = Appointment::where('employee_id', $this->employee_id)
            ->where('appointment_date', $this->appointment_date)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('start', [$start_time, $end_time])
                    ->orWhereBetween('end', [$start_time, $end_time])
                    ->orWhere(function ($query) use ($start_time, $end_time) {
                        $query->where('start', '<=', $start_time)
                            ->where('end', '>=', $end_time);
                    });
            })
            ->exists();

        if ($overlap) {
            session()->flash('error', 'Orario non disponibile, scegli un altro slot.');
            return;
        }

        $this->appointment = Appointment::create([
            'name' => $this->name,
            'cellphone' => $this->cellphone,
            'email' => $this->email,
            'employee_id' => $this->employee_id,
            'service_id' => $this->service_id,
            'user_id'=>$this->user_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'start' => $start_time->format('Y-m-d H:i:s'),
            'end' => $end_time->format('Y-m-d H:i:s'),
        ]);
        session()->flash('success', 'Prenotazione inviata!');
    }

    public function render()
    {
        $hours = $this->hours;
        return view('livewire.user-reservation', compact('hours'));
    }
}
