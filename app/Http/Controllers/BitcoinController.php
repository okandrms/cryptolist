<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crypto_transaction;
use App\Http\Controllers\FetchController;

class BitcoinController extends Controller
{
    public function display() {
        $currentBitcoinPrice = FetchController::getBitcoinPrice();

        $totalInvestment = 0;
        $totalBitcoins = 0;
        $currentValue = 0;
        $profitOrLoss = 0;
        $eurRate = 0;
        $user_id = auth()->user()->id;
        $allTransactions = Crypto_transaction::where('user_id', $user_id)->get();

        foreach ($allTransactions as $transaction) {
            $transaction->btc_amount = $transaction->amount / $transaction->price_per_unit;
        }

        return view('bitcoin', compact('currentBitcoinPrice', 'totalInvestment', 'totalBitcoins', 'currentValue', 'profitOrLoss', 'eurRate', 'allTransactions'));
    }

    public function buyBitcoin(Request $request) {
        // Check if any of the required fields are empty
        if (empty($request->amount)) {
            return redirect()->back()->with('error', 'Please fill in all the fields!');
        }

        $crypto_transaction = new Crypto_transaction();
        $currentBitcoinPrice = FetchController::getBitcoinPrice();
        $crypto_transaction->amount = $request->amount;
        $crypto_transaction->price_per_unit = $currentBitcoinPrice;
        $crypto_transaction->user_id = auth()->user()->id;
        $crypto_transaction->crypto_wallet_id = 1;
        $crypto_transaction->save();

        $allTransactions = Crypto_transaction::all();

        foreach ($allTransactions as $transaction) {
            $transaction->btc_amount = $transaction->amount / $transaction->price_per_unit;
        }

        return view('bitcoin', compact('currentBitcoinPrice', 'allTransactions'));

    }
}
