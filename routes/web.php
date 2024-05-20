<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\BitcoinPriceController;
use App\Http\Controllers\BitcoinController;
use App\Http\Controllers\WalletController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/bitcoin-price', function () {
    $response = Http::get('https://api.coinbase.com/v2/prices/spot?currency=EUR');
    return $response->json();
});


// Example routes to interact with BitcoinPriceController
/* Route::get('/bitcoin/investment', [BitcoinPriceController::class, 'getTotalInvestment']);
Route::get('/bitcoin/bitcoins', [BitcoinPriceController::class, 'getTotalBitcoins']);
Route::get('/bitcoin/value', [BitcoinPriceController::class, 'getCurrentValue']);
Route::get('/bitcoin/profit', [BitcoinPriceController::class, 'getProfitOrLoss']);
Route::post('/bitcoin/purchase', [BitcoinPriceController::class, 'addPurchase']);
Route::post('/bitcoin/update-price', [BitcoinPriceController::class, 'updateCurrentBitcoinPrice']); */
Route::get('/bitcoin/display', [BitcoinController::class, 'display']);

Route::post('bitcoin', [BitcoinController::class, 'buyBitcoin'])->name('buy.bitcoin');


Route::get('/myWallet', [WalletController::class, 'myWallet'])->name('myWallet');
require __DIR__.'/auth.php';
