<?php

namespace Database\Seeders;


use App\Models\TrainingPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TrainingPackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $packages = [
            [
                'id'              => 1,
                'name'     => 'package_1',
                'price'            => 200,
                'sessions_number'         => 2,
                'created_at'      => now(),

            ],
            [
                'id'              => 2,
                'name'     => 'package_2',
                'price'            => 500,
                'sessions_number'         => 5,
                'created_at'      => now(),
            ],
            [
                'id'              => 3,
                'name'     => 'package_3',
                'price'            => 700,
                'sessions_number'         => 7,
                'created_at'      => now(),

            ],
          
        ];

        TrainingPackage::insert($packages);
    }
}
