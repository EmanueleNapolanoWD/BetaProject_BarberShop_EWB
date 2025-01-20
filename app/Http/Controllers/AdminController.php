<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_panoramic()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcome')->with('error', 'Accesso negato.'); 
        } else {
            return view('admin.panoramic');
        }
    }

    public function admin_reservation()
    {        
        return view('admin.reservation');
    }

    public function admin_employee()
    {        
        $employees = Employee::all();
        $services = Service::all();
        return view('admin.employee',compact('employees','services'));
    }
}
