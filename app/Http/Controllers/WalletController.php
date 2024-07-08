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

        $totalInvestment = '0.00000000';
        $totalBitcoins = '0.00000000';
        $currentBitcoinPrice = FetchController::getBitcoinPrice();

        foreach ($allTransactions as $transaction) {
            if (is_numeric($transaction->amount) && is_numeric($transaction->price_per_unit)) {
                $totalInvestment = bcadd($totalInvestment, $transaction->amount, 8);

                $transaction->btc_amount = bcdiv($transaction->amount, $transaction->price_per_unit, 8);
                $totalBitcoins = bcadd($totalBitcoins, $transaction->btc_amount, 8);

                // Update the transaction to include the current_value and profit_or_loss attributes
                $transaction->current_value = bcmul($transaction->btc_amount, $currentBitcoinPrice, 8);
                $transaction->profit_or_loss = bcsub($transaction->current_value, $transaction->amount, 8);
            } else {
                echo "Invalid transaction data: amount or price_per_unit is not numeric.\n";
            }
        }

        $currentValue = bcmul($totalBitcoins, $currentBitcoinPrice, 8);
        $profitOrLoss = bcsub($currentValue, $totalInvestment, 8);

        return view('myWallet', compact('allTransactions', 'totalInvestment', 'totalBitcoins', 'currentBitcoinPrice', 'currentValue', 'profitOrLoss'));
    }
}
