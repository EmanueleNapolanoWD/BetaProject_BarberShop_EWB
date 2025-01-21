<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class AddReservation extends Component
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
        }

        $this->appointment = Appointment::create([
            'name' => $this->name,
            'cellphone' => $this->cellphone,
            'email' => $this->email,
            'employee_id' => $this->employee_id,
            'service_id' => $this->service_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time'=>$this->appointment_time,
        ]);

    }

    public function render()
    {
        $hours = $this->hours;
        return view('livewire.add-reservation',compact('hours'));
    }
}
