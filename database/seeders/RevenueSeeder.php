<?php

namespace Database\Seeders;


use App\Models\Revenue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $revenues = [
            [
                'id'              => 1,
                'gym_id'     => 1,
                'user_id'            => 1,
                'package_id'         => 1,
                'amount_paid'      => 2000,
                'created_at' => now(),

            ],
            [
                'id'              => 2,
                'gym_id'     => 2,
                'user_id'            => 2,
                'package_id'         => 2,
                'amount_paid'      => 2500,
                'created_at' => now(),
            ],
            [
                'id'              => 3,
                'gym_id'     => 3,
                'user_id'            => 3,
                'package_id'         => 3,
                'amount_paid'      => 3000,
                'created_at' => now(),

            ],
          
        ];

        Revenue::insert($revenues);
    }
}
