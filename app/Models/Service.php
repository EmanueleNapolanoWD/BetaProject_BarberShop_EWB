<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','description','price','duration'];

    public function appointments()
    {
        return $this->belongsTo(Appointment::class);
    }
}
