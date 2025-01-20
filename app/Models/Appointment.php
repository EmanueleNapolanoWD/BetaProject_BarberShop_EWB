<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['name','email','cellphone','user_id','employee_id','service_id','appointment_date','start','end','status'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function services()
    {
        return $this->belongsTo(Service::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
