<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDistrict extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'district_id' , 'added_by' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
