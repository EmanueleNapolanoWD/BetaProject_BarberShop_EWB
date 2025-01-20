<?php

namespace App\Livewire;

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
    public $appointment_date;
    public $appointment;
    public $user;


    public function store()
    {
        if (Auth::check()) {
            $this->user_id = Auth::user()->id;
            $this->name =  Auth::user()->name;
            $this->cellphone = Auth::user()->cellphone;
            $this->email = Auth::user()->email;
        }

        $this->validate();
        $this->appointment = Appointment::create([
            'name' => $this->name,
            'cellphone' => $this->cellphone,
            'email' => $this->email,
            'employee_id' => $this->employee_id,
            'service_id' => $this->service_id,
            'appointment_date' => $this->appointment_date,
        ]);

    }

    public function render()
    {
        return view('livewire.add-reservation');
    }
}
