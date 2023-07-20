<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserTask;
class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserTask = new UserTask;
        $UserTask->task_id = 1;
        $UserTask->user_id = 1;
        $UserTask->added_by = 1;
        $UserTask->save();


        $UserTask = new UserTask;
        $UserTask->task_id = 2;
        $UserTask->user_id = 1;
        $UserTask->added_by = 1;
        $UserTask->save();


        $UserTask = new UserTask;
        $UserTask->task_id = 3;
        $UserTask->user_id = 1;
        $UserTask->added_by = 1;
        $UserTask->save();


    }
}
