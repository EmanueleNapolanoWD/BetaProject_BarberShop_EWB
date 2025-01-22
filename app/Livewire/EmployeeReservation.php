<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class EmployeeReservation extends Component
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
    public $date;
    public $hour;
    public $appointment;
    public $user;
    public $hours;



    public function store()
    {

        $this->employee_id = Auth::user()->employee->id;
        $start_time = Carbon::createFromFormat('H:i', $this->hour);
        $service = Service::find($this->service_id);
        $end_time = $start_time->copy()->addMinutes($service->duration);
        $this->date = Carbon::createFromFormat('d-m-Y', $this->date)->format('Y-m-d');


        if (!$service) {
            session()->flash('error', 'Servizio non valido.');
            return;
        }

        // Controlla sovrapposizione
        $overlap = Appointment::where('employee_id', $this->employee_id)
            ->where('appointment_date', $this->date)
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
            'appointment_date' => $this->date,
            'appointment_time' => $this->hour,
            'start' => $start_time->format('Y-m-d H:i:s'),
            'end' => $end_time->format('Y-m-d H:i:s'),
        ]);
    }

    public function render()
    {
        return view('livewire.employee-reservation');
    }
}
