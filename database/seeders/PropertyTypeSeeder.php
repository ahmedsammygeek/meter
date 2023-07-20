<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;
class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PropertyType = new PropertyType;
        $PropertyType->name = 'سكنى';
        $PropertyType->user_id = 1;
        $PropertyType->is_active = 1;
        $PropertyType->save();

        $PropertyType = new PropertyType;
        $PropertyType->name = 'تجارى';
        $PropertyType->user_id = 1;
        $PropertyType->is_active = 1;
        $PropertyType->save();

        $PropertyType = new PropertyType;
        $PropertyType->name = 'حكومى';
        $PropertyType->user_id = 1;
        $PropertyType->is_active = 1;
        $PropertyType->save();

        $PropertyType = new PropertyType;
        $PropertyType->name = 'VIP';
        $PropertyType->user_id = 1;
        $PropertyType->is_active = 1;
        $PropertyType->save();
    }
}
