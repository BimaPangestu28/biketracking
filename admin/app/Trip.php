<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['user_id', 'category_id', 'start', 'end', 'distance', 'time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(TripCategory::class);
    }

    public function speeds()
    {
        return $this->belongsToMany(TripSpeed::class);
    }

    public function coordinates()
    {
        return $this->belongsToMany(TripCoordinate::class);
    }
}
