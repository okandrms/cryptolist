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

       // Başlangıç değerleri atanıyor
$totalInvestment = 0;
$totalBitcoins = 0;

foreach ($allTransactions as $transaction) {
    // amount ve price_per_unit değerlerinin sayısal olup olmadığını kontrol edin
    if (is_numeric($transaction->amount) && is_numeric($transaction->price_per_unit)) {
        // Toplam yatırımı hesapla
        $totalInvestment += $transaction->amount;

        // BTC miktarını hesapla
        $transaction->btc_amount = $transaction->amount / $transaction->price_per_unit;

        // Toplam Bitcoin miktarını güncelle
        $totalBitcoins += $transaction->btc_amount;

        // Mevcut değeri hesapla
        $transaction->current_value = $transaction->btc_amount * $currentBitcoinPrice;

        // Kâr veya zararı hesapla
        // Hatalı hesaplamayı düzeltiyoruz: `btc_amount`'ı `price_per_unit` ile çarpmak yerine `amount` ile `price_per_unit`'i çarpıyoruz
        $transaction->profit_or_loss = $transaction->current_value - $transaction->amount;

        
    } else {
        // Sayısal olmayan değerler için hata mesajı veya başka bir işlem yapabilirsiniz
        echo "Hatalı işlem verisi: amount veya price_per_unit sayısal değil.\n";
    }
}


        return view('myWallet', compact('allTransactions', 'totalInvestment', 'totalBitcoins', 'currentBitcoinPrice'));
    }
}
