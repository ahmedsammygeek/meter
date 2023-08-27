<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // AreaSeeder::class , 
            // CitySeeder::class , 
            // DistrictSeeder::class , 
            // TaskSeeder::class , 
            // UserTaskSeeder::class , 
            MeterTypeSeeder::class , 
            // PropertyTypeSeeder::class , 
            // SegmentTypeSeeder::class , 
        ]);
    }
}
