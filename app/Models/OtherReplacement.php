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

    public function typeAsText()
    {
        switch ($this->type) {
            case 1:
            return 'استبدال صندوق';
            break;
            case 2:
            return 'استبدال محبس';
            break;
            case 3:
            return 'استبدال حامى معدنى';
            break;
            default:
            return 'غير محدد';
            break;
        }
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
