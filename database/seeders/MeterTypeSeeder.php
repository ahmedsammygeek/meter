<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeterType;
class MeterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $MeterType = new MeterType;
        $MeterType->name  = 'ذكى';
        $MeterType->user_id = 1;
        $MeterType->is_active = 1;
        $MeterType->save();


        $MeterType = new MeterType;
        $MeterType->name  = 'ميكانيكى';
        $MeterType->user_id = 1;
        $MeterType->is_active = 1;
        $MeterType->save();
    }
}
