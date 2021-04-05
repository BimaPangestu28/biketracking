<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
