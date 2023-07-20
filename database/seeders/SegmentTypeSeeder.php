<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SegmentType;
class SegmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SegmentType = new SegmentType;
        $SegmentType->name = 'عقار قائم ';
        $SegmentType->user_id = 1;
        $SegmentType->is_active = 1;
        $SegmentType->save();

        $SegmentType = new SegmentType;
        $SegmentType->name = 'ارض فضاء';
        $SegmentType->user_id = 1;
        $SegmentType->is_active = 1;
        $SegmentType->save();


        $SegmentType = new SegmentType;
        $SegmentType->name = 'عقار مهدوم';
        $SegmentType->user_id = 1;
        $SegmentType->is_active = 1;
        $SegmentType->save();

        $SegmentType = new SegmentType;
        $SegmentType->name = 'عقار تحت الانشاء';
        $SegmentType->user_id = 1;
        $SegmentType->is_active = 1;
        $SegmentType->save();
    }
}
