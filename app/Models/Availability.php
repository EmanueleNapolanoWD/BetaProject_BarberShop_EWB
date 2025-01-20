<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = ['employee_id','day','start_work','end_work'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
