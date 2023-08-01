<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function districts() {
        
        return $this->hasMany(District::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
