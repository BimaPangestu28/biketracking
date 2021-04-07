<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripSpeed extends Model
{
    protected $fillable = ['trip_id', 'speed'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
