<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function showAppointments($id)
    {
        $appointments = Appointment::where('employee_id', $id)
            ->whereDate('appointment_date', '>=', now()->toDateString())
            ->get();
            
        foreach ($appointments as $appointment) {
            $appointment->appointment_date = Carbon::parse($appointment->appointment_date);
        }

        $dates = collect();
        for ($i = 0; $i < 7; $i++) {
            $dates->push(now()->addDays($i));
        }

        $hours = [];
        $start = Carbon::createFromTime(8, 0); // 08:00
        $end = Carbon::createFromTime(19, 0); // 19:00
        while ($start <= $end) {
            $hours[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        return view('employee.appointments', compact('appointments', 'dates', 'hours'));
    }

    public function create_reservation_from_employee($date,$hour)
    {
        return view('reservation.create_reservation',compact('date','hour'));
    }
}
