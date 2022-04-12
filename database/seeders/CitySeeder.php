<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
    //City::factory(10)->create();

    
    $cities = [
        [
            'id'              => 1,
            'name'            => 'Cairp',
        ],
        [
            'id'              => 2,
            'name'            => 'Giza',
        ],
    
      
    ];

    City::insert($cities);

    }


}
