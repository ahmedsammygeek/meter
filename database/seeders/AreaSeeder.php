<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Area = new Area;
        $Area->name = 'Area 1 ';
        $Area->user_id = 1;
        $Area->is_active = 1;
        $Area->save();

        $Area = new Area;
        $Area->name = 'Area 2 ';
        $Area->user_id = 1;
        $Area->is_active = 1;
        $Area->save();


        $Area = new Area;
        $Area->name = 'Area 3 ';
        $Area->user_id = 1;
        $Area->is_active = 1;
        $Area->save();


        $Area = new Area;
        $Area->name = 'Area 4 ';
        $Area->user_id = 1;
        $Area->is_active = 1;
        $Area->save();



        $Area = new Area;
        $Area->name = 'Area 5 ';
        $Area->user_id = 1;
        $Area->is_active = 1;
        $Area->save();
    }
}
