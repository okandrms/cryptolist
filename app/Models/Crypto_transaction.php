<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\FetchController;

class Crypto_transaction extends Model
{
    protected $fillable = ['amount', 'price_per_unit', 'btc_amount', 'user_id'];

    public function getCurrentValueAttribute()
    {
        $currentBitcoinPrice = FetchController::getBitcoinPrice(); // Fetch current price
        return bcmul($this->btc_amount, $currentBitcoinPrice, 8);
    }

    public function getProfitOrLossAttribute()
    {
        return bcsub($this->current_value, $this->amount, 8);
    }
}
