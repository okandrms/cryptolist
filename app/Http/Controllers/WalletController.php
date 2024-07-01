<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crypto_transaction;
use App\Http\Controllers\FetchController;

class WalletController extends Controller
{
    public function myWallet() {
        $user_id = auth()->user()->id;
        $allTransactions = Crypto_transaction::where('user_id', $user_id)->get();

        $totalInvestment = 0;
        $totalBitcoins = 0;
        $currentBitcoinPrice = FetchController::getBitcoinPrice();


$totalInvestment = 0;
$totalBitcoins = 0;

foreach ($allTransactions as $transaction) {

    if (is_numeric($transaction->amount) && is_numeric($transaction->price_per_unit)) {

        $totalInvestment += $transaction->amount;


        $transaction->btc_amount = $transaction->amount / $transaction->price_per_unit;


        $totalBitcoins += $transaction->btc_amount;


        $transaction->current_value = $transaction->btc_amount * $currentBitcoinPrice;


        $transaction->profit_or_loss = $transaction->current_value - $transaction->amount;


    } else {
        // You can display an error message or take other actions for non-numeric values
        echo "Invalid transaction data: amount or price_per_unit is not numeric.\n";
    }

}


        return view('myWallet', compact('allTransactions', 'totalInvestment', 'totalBitcoins', 'currentBitcoinPrice'));
    }
}
