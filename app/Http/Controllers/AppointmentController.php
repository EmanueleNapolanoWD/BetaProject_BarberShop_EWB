<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create_reservation()
    {
        $hours = [];
        $start = Carbon::createFromTime(8, 0); // 08:00
        $end = Carbon::createFromTime(19, 0); // 19:00
        while ($start <= $end) {
            $hours[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        $employees = Employee::all();
        return view ('reservation.create_reservation',compact('employees','hours'));
    }

   
}
