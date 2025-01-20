<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Service;
use App\Models\Category;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'password' => 'administrator',
            'role' => 'admin',
        ]);

        $services = [
            [
                'name' => 'Taglio Uomo',
                'description' => 'Un taglio moderno e alla moda per uomo.',
                'duration' => '00:30:00',
                'price' => 15.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Barba e Styling',
                'description' => 'Rifinitura della barba e styling professionale.',
                'duration' => '00:20:00',
                'price' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Taglio Donna',
                'description' => 'Taglio personalizzato per donna, con consulenza inclusa.',
                'duration' => '00:45:00',
                'price' => 25.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Piega',
                'description' => 'Piega con styling professionale.',
                'duration' => '00:30:00',
                'price' => 12.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Colore e Meches',
                'description' => 'Colorazione personalizzata e meches.',
                'duration' => '01:30:00',
                'price' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trattamento Capelli',
                'description' => 'Trattamento nutriente per capelli danneggiati.',
                'duration' => '00:40:00',
                'price' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'name' => $service['name'],
                'description' => $service['description'],
                'duration' => $service['duration'],
                'price' => $service['price'],
            ]);
        }

        $employees =[
            [
               'name'=>'Carlo Rossi',
               'email'=>'Carlo@rossi.com',
               'phone'=>'3256987412',
               'speciality'=>'barba',
               'status'=>'inactive',             
            ],

             [
               'name'=>'Mario Verdi',
               'email'=>'mario@versi.com',
               'phone'=>'325695945',
               'speciality'=>'taglio',
               'status'=>'inactive',
             ],

        ];

        foreach ($employees as $employee){
            Employee::create([
                 'name'=>$employee['name'],
                 'email'=>$employee['email'],
                 'phone'=>$employee['phone'],
                 'speciality'=>$employee['speciality'],
                 'status'=>$employee['status'],
            ]);
        }
    }
}
