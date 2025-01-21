<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','phone','email','speciality','status','user_id'];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    
}
