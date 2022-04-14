<?php

namespace Database\Seeders;

use App\Models\Coach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $coaches = [
            [
                'id'              => 1,
                'name'            => 'laila',
                'gym_id'         => '1',
            ],
            [
                'id'              => 2,
                'name'            => 'hagar',
                'gym_id'         => '2',
            ],
            [
                'id'              => 3,
                'name'            => 'yosra',
                'gym_id'         => '3',

            ],
            [
                'id'              => 4,
                'name'            => 'salma',
                'gym_id'         => '4',

            ],
          
        ];

        Coach::insert($coaches);
    }
}
