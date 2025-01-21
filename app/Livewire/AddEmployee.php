<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Artisan;

class AddEmployee extends Component
{
   
    public $services;
    public $service_id;
    public $speciality;
    public $employee;
    public $selectedUser;
    public $user;


    public function store()
    {
        $selectedUser = User::find($this->user);
        $speciality = Service::find($this->service_id);

        $this->employee = Employee::create([
            'name' => $selectedUser->name,
            'phone' => $selectedUser->cellphone,
            'email' => $selectedUser->email,
            'speciality' => $speciality->name,
            'user_id'=>$selectedUser->id,
        ]);
        session()->flash('success', 'Dipendente aggiunto con successo!');
        $this->cleanForm();

        Artisan::call('app:make-user-employee',['email'=>$selectedUser->email]);
    }

    public function cleanForm()
    {
        $this->user = '';
        $this->speciality = '';

    }

    public function render()
    {
        $usersEmployee = User::all();
        return view('livewire.add-employee',compact('usersEmployee'));
    }
}
