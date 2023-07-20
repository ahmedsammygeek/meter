<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherReplacementFile extends Model
{
    use HasFactory;

    protected $fillable = ['file' , 'other_replacement_id' ];
}
