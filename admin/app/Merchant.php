<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = ['name', 'latitude', 'longitude', 'image'];

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }
}
