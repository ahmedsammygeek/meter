<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherReplacement extends Model
{
    use HasFactory;


     public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function files()
    {
        return $this->hasMany(OtherReplacementFile::class);
    }
}
