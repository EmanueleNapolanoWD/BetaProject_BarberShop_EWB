<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;

class AddEmployee extends Component
{
    public $name;
    public $phone;
    public $speciality;
    public $email;
    public $services;
    public $service;
    public $employee;

    public function mouth()
    {
        
    }

    public function store()
    {
        $this->employee = Employee::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'speciality' => $this->speciality,
        ]);
        session()->flash('success', 'Dipendente aggiunto con successo!');
        $this->cleanForm();
    }

    public function cleanForm()
    {
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->speciality = '';

    }

    public function render()
    {
        return view('livewire.add-employee');
    }
}
