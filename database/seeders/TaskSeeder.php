<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Task = new Task;
        $Task->name = 'مهمة المسح الميداني';
        $Task->user_id = 1;
        $Task->save();

        $Task = new Task;
        $Task->name = 'مهمة استبدال عداد';
        $Task->user_id = 1;
        $Task->save();


        $Task = new Task;
        $Task->name = 'مهمة أي نشاط ميادني ';
        $Task->user_id = 1;
        $Task->save();
    }
}
