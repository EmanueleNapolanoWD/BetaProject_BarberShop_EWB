<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Service;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $users = User::all();
        View::share('users',$users);

        $employees = Employee::all();
        view::share('employees',$employees);

        $services = Service::all();
        view::share('services',$services);
    }
}
