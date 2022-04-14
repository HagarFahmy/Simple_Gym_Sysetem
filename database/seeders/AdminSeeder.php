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

         /* city managers*/

        $CityManager = Admin::create([
           'name' => 'Cairo City Manager',
           'email' => 'CairoManager@admin.com',
           'password' => 123456,
           'city_id'=> 1,

        ]);
        $CityManager->assignRole('City Manager');

        $CityManager = Admin::create([
         'name' => 'Giza City Manager',
         'email' => 'GizaManager@admin.com',
         'password' => 123456,
         'city_id'=> 2,

      ]);
      $CityManager->assignRole('City Manager');

      
      /* gym managers */

      $GymManager = Admin::create([
         'name' => 'Gym1_1 Manager',
         'email' => 'gym1-1Manager@admin.com',
         'password' => 123456,
         'gym_id'=> 1,

      ]);
      $GymManager->assignRole('Gym Manager');

      $GymManager = Admin::create([
         'name' => 'Gym1_2 Manager',
         'email' => 'gym1-2Manager@admin.com',
         'password' => 123456,
         'gym_id'=> 1,

      ]);
      $GymManager->assignRole('Gym Manager');
                   
      $GymManager = Admin::create([
         'name' => 'Gym_2 Manager',
         'email' => 'gym2Manager@admin.com',
         'password' => 123456,
         'gym_id'=> 2,

      ]);
      $GymManager->assignRole('Gym Manager');

      $GymManager = Admin::create([
         'name' => 'Gym_3 Manager',
         'email' => 'gym3Manager@admin.com',
         'password' => 123456,
         'gym_id'=> 3,

      ]);
      $GymManager->assignRole('Gym Manager');

      $GymManager = Admin::create([
         'name' => 'Gym_4 Manager',
         'email' => 'gym4Manager@admin.com',
         'password' => 123456,
         'gym_id'=> 4,

      ]);
      $GymManager->assignRole('Gym Manager');
    }


}
