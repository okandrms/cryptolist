<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crypto_transaction;
use App\Http\Controllers\FetchController;

class BitcoinController extends Controller
{
    public function display() {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login.');
        }

        $currentBitcoinPrice = FetchController::getBitcoinPrice();

        $totalInvestment = '0.00000000';
        $totalBitcoins = '0.00000000';
        $user_id = auth()->user()->id;
        $allTransactions = Crypto_transaction::where('user_id', $user_id)->get();

        foreach ($allTransactions as $transaction) {
            $transaction->btc_amount = bcdiv($transaction->amount, $transaction->price_per_unit, 8);
            $totalInvestment = bcadd($totalInvestment, $transaction->amount, 8);
            $totalBitcoins = bcadd($totalBitcoins, $transaction->btc_amount, 8);
            $transaction->current_value = bcmul($transaction->btc_amount, $currentBitcoinPrice, 8);
            $transaction->profit_or_loss = bcsub($transaction->current_value, $transaction->amount, 8);
        }

        $currentValue = bcmul($totalBitcoins, $currentBitcoinPrice, 8);
        $profitOrLoss = bcsub($currentValue, $totalInvestment, 8);

        return view('bitcoin', compact('currentBitcoinPrice', 'totalInvestment', 'totalBitcoins', 'currentValue', 'profitOrLoss', 'allTransactions'));
    }

    public function buyBitcoin(Request $request) {
        if (empty($request->amount)) {
            return redirect()->back()->with('error', 'Please fill in all the fields!');
        }

        $crypto_transaction = new Crypto_transaction();
        $currentBitcoinPrice = FetchController::getBitcoinPrice();
        $crypto_transaction->amount = $request->amount;
        $crypto_transaction->price_per_unit = $currentBitcoinPrice;
        $crypto_transaction->user_id = auth()->user()->id;
        $crypto_transaction->crypto_wallet_id = 1;
        $crypto_transaction->btc_amount = bcdiv($request->amount, $currentBitcoinPrice, 8);
        $crypto_transaction->save();

        return redirect()->route('bitcoin.display');
    }
}
