<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crypto_transaction;
use App\Http\Controllers\FetchController;

class WalletController extends Controller
{
    public function myWallet() {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login.');
        }

        // Get the authenticated user's ID
        $user_id = auth()->id();

        // Retrieve all transactions for the authenticated user
        $allTransactions = Crypto_transaction::where('user_id', $user_id)->get();

        // Initialize values
        $totalInvestment = '0.00000000';
        $totalBitcoins = '0.00000000';
        $currentBitcoinPrice = FetchController::getBitcoinPrice();

        // Loop through all transactions
        foreach ($allTransactions as $transaction) {
            if (is_numeric($transaction->amount) && is_numeric($transaction->price_per_unit)) {
                // Calculate total investment
                $totalInvestment = bcadd($totalInvestment, $transaction->amount, 8);

                // Calculate the amount of BTC for the transaction
                $transaction->btc_amount = bcdiv($transaction->amount, $transaction->price_per_unit, 8);
                $totalBitcoins = bcadd($totalBitcoins, $transaction->btc_amount, 8);

                // Calculate the current value and profit or loss for the transaction
                $transaction->current_value = bcmul($transaction->btc_amount, $currentBitcoinPrice, 8);
                $transaction->profit_or_loss = bcsub($transaction->current_value, $transaction->amount, 8);
            } else {
                echo "Invalid transaction data: amount or price_per_unit is not numeric.\n";
            }
        }

        // Calculate current value and profit/loss
        $currentValue = bcmul($totalBitcoins, $currentBitcoinPrice, 8);
        $profitOrLoss = bcsub($currentValue, $totalInvestment, 8);

        // Pass the results to the myWallet view
        return view('myWallet', compact('allTransactions', 'totalInvestment', 'totalBitcoins', 'currentBitcoinPrice', 'currentValue', 'profitOrLoss'));
    }
}
