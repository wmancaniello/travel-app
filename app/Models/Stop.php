<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
