<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterReplacement extends Model
{
    use HasFactory;



    public function files()
    {
        return $this->hasMany(MeterReplacementFile::class);
    }
}
