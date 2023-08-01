<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldSurvey extends Model
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
        return $this->hasMany(FieldSurveyFile::class);
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function segment_type()
    {
        return $this->belongsTo(SegmentType::class);
    }


    public function meter_type()
    {
        return $this->belongsTo(MeterType::class);
    }


}
