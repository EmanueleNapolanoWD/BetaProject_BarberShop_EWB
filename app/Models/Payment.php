<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['appointment_id','method','status','amount'];

    public function appointments()
    {
        return $this->hasOne(Appointment::class);
    }
}

