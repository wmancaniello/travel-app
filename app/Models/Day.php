<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}
