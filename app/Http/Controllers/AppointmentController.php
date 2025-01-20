<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create_reservation()
    {
        return view ('reservation.create_reservation');
    }
}
