<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterReplacement extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function meter_company()
    {
        return $this->belongsTo(MeterCompany::class , 'new_meter_company_id' );
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public function files()
    {
        return $this->hasMany(MeterReplacementFile::class);
    }
}
