<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class , 'task_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class , 'district_id');
    }
}
