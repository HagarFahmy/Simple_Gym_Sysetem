<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AttendenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $attendence = [
            [
                'id'              => 1,
                'user_id'     => 1,
                'training_session_id'  => 1,
            
            ],
            [
                'id'              => 2,
                'user_id'     => 2,
                'training_session_id'   =>2,
            
            ],
            [
                'id'              => 3,
                'user_id'     => 3,
                'training_session_id' => 2,
            

            ],
          
        ];

        Attendance::insert($attendence);
    }
}
