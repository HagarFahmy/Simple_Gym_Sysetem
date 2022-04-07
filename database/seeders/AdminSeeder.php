<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
           'name' => 'Super Admin',
           'email' => 'admin@admin.com',
           'password' => 123456,

        ]);
        $admin->assignRole('Super Admin');


        $GymManager = Admin::create([
           'name' => 'Gym Manager',
           'email' => 'gymManager@admin.com',
           'password' => 123456,

        ]);
        $GymManager->assignRole('Gym Manager');


        $CityManager = Admin::create([
           'name' => 'City Manager',
           'email' => 'cityManager@admin.com',
           'password' => 123456,

        ]);
        $CityManager->assignRole('City Manager');

    }
}
