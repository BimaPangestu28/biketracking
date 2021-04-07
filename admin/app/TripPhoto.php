<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripPhoto extends Model
{
    protected $fillable = ['trip_id', 'longitude', 'latitude', 'photo', 'caption'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
