<?php

namespace Database\Seeders;


use App\Models\Gym;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $gyms = [
            [
                'id'              => 1,
                'cover_image'     => 'default.jpg',
                'name'            => 'gym_1',
                'city_id'         => '1',
                'created_at'      => now(),
                'city_manager_id' => '3',

            ],
            [
                'id'              => 2,
                'cover_image'     => 'default.jpg',
                'name'            => 'gym_2',
                'city_id'         => '2',
                'created_at'      => now(),
                'city_manager_id' => '3',
            ],
            [
                'id'              => 3,
                'cover_image'     => 'default.jpg',
                'name'            => 'gym_3',
                'city_id'         => '1',
                'created_at'      => now(),
                'city_manager_id' => '3',

            ],
          
        ];

        Gym::insert($gyms);
    }
}
