<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $District = new District;
        $District->name = 'District 1 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 1;
        $District->save();

        $District = new District;
        $District->name = 'District 2 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 1;
        $District->save();



        $District = new District;
        $District->name = 'District 3 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 2;
        $District->save();

        $District = new District;
        $District->name = 'District 4 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 2;
        $District->save();



        $District = new District;
        $District->name = 'District 5 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 3;
        $District->save();

        $District = new District;
        $District->name = 'District 6 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 3;
        $District->save();


        $District = new District;
        $District->name = 'District 7 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 4;
        $District->save();

        $District = new District;
        $District->name = 'District 8 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 4;
        $District->save();



        $District = new District;
        $District->name = 'District 9 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 5;
        $District->save();

        $District = new District;
        $District->name = 'District 10 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 5;
        $District->save();


        $District = new District;
        $District->name = 'District 11 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 6;
        $District->save();

        $District = new District;
        $District->name = 'District 12 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 6;
        $District->save();



        $District = new District;
        $District->name = 'District 13 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 7;
        $District->save();

        $District = new District;
        $District->name = 'District 14 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 7;
        $District->save();



        $District = new District;
        $District->name = 'District 15 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 8;
        $District->save();

        $District = new District;
        $District->name = 'District 16 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 8;
        $District->save();




        $District = new District;
        $District->name = 'District 17 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 9;
        $District->save();

        $District = new District;
        $District->name = 'District 18 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 9;
        $District->save();


        $District = new District;
        $District->name = 'District 19 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 10;
        $District->save();

        $District = new District;
        $District->name = 'District 20 ';
        $District->user_id = 1;
        $District->is_active = 1;
        $District->city_id = 10;
        $District->save();








    }
}
