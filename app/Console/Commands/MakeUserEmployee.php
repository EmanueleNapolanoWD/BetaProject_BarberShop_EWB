<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserEmployee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-employee {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rende user un employee';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email',$this->argument('email'))->first();
        $user->role = 'employee';
        $user->save();
    }
}
