<?php

namespace Database\Seeders;


use App\Models\TrainingSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TrainingSessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Sessions = [
            [
                'id'              => 1,
                'name'     => 'session_1',
                'starts_at'            => '2022-04-09 01:00:00',
                'finishes_at'         => '2022-04-09 03:00:00',
                'gym_id' => '1',
                'created_at'      => now(),
                

            ],
            [
                'id'              => 2,
                'name'     => 'session_2',
                'starts_at'            => '2022-04-10 01:00:00',
                'finishes_at'         => '2022-04-10 03:00:00',
                'gym_id' => '1',
                'created_at'      => now(),
            ],
            [
                'id'              => 3,
                'name'     => 'session_3',
                'starts_at'            => '2022-04-09 01:00:00',
                'finishes_at'         => '2022-04-09 03:00:00',
                'gym_id' => '2',
                'created_at'      => now(),

            ],

            [
                'id'              => 4,
                'name'     => 'session_4',
                'starts_at'            => '2022-04-10 04:00:00',
                'finishes_at'         => '2022-04-10 07:00:00',
                'gym_id' => '1',
                'created_at'      => now(),

            ],
          
        ];

        TrainingSession::insert($Sessions);
    }
}
