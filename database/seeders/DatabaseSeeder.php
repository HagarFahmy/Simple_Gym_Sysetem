<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(GymSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(TrainingSessionsSeeder::class);
        $this->call(TrainingPackagesSeeder::class);
        $this->call(RevenueSeeder::class);
        $this->call(AttendenceSeeder::class);
                
        
    }
}
