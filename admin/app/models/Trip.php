<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['user_id', 'category_id', 'start', 'end', 'distance', 'time'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function category()
    {
        return $this->belongsTo(TripCategory::class);
    }
}
