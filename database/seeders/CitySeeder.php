<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $City = new City;
        $City->name = 'City 1 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 1;
        $City->save();

        $City = new City;
        $City->name = 'City 2 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 1;
        $City->save();



        $City = new City;
        $City->name = 'City 3 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 2;
        $City->save();



        $City = new City;
        $City->name = 'City 4 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 2;
        $City->save();



        $City = new City;
        $City->name = 'City 5 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 3;
        $City->save();





        $City = new City;
        $City->name = 'City 6 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 3;
        $City->save();




        $City = new City;
        $City->name = 'City 7 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 4;
        $City->save();

        $City = new City;
        $City->name = 'City 8 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 4;
        $City->save();


        $City = new City;
        $City->name = 'City 9 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 5;
        $City->save();

        $City = new City;
        $City->name = 'City 10 ';
        $City->user_id = 1;
        $City->is_active = 1;
        $City->area_id = 5;
        $City->save();
    }
}
