<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id','product_id','rating','comment'];

    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function appointment()
    {
        $this->hasOne(Appointment::class);
    }
}
