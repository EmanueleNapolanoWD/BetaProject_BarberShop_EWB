<?php

use App\Models\Appointment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AppointmentController;

// public routes
Route::get('/' , [PublicController::class,'homepage'])->name('HomePage');

// Admin Route
Route::get('/admin/panoramic',[AdminController::class,'admin_panoramic'])->name('admin_panoramic');
Route::get('/admin/employees',[AdminController::class,'admin_employee'])->name('admin_employee');
Route::get('/admin/reservation',[AdminController::class,'admin_reservation'])->name('admin_reservation');

// reservation route
Route::get('/reservation',[AppointmentController::class,'create_reservation'])->name('create_reservation');




