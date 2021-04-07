<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripCoordinate extends Model
{
    protected $fillable = ['trip_id', 'latitude', 'longitude'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
