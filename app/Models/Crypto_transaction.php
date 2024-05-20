<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crypto_transaction extends Model
{
    protected $fillable = ['amount', 'price_per_unit', 'btc_amount', 'user_id'];

    public function getCurrentValueAttribute()
    {
        return $this->btc_amount * $this->price_per_unit;
    }

    public function getProfitOrLossAttribute()
    {
        return $this->current_value - $this->amount;
    }
}
