<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripDetail extends Model
{
    protected $fillable = ['speed', 'latitude', 'longitude', 'trip_id'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
