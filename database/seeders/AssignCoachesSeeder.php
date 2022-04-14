<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\TrainingSession;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AssignCoachesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Tcoaches = [
            [
                'id'              => 1,
                'coach_id'            => '4',
                'training_session_id'         => '1',
            ],
            [
                'id'              => 2,
                'coach_id'            => '3',
                'training_session_id'         => '2',
            ],
            [
                'id'              => 3,
                'coach_id'            => '2',
                'training_session_id'         => '3',
            ],
            [
                'id'              => 4,
                'coach_id'            => '1',
                'training_session_id'         => '4',
            ],
            [
                'id'              => 5,
                'coach_id'            => '2',
                'training_session_id'         => '5',
            ],
          
        ];

        DB::table('coach_training_session')->insert($Tcoaches);
    }
}
