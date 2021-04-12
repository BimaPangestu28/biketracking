<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['merchant_id', 'name', 'image', 'point_redeem', 'valid_until'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
