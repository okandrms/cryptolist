<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\BitcoinPriceController;
use App\Http\Controllers\BitcoinController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/bitcoin-price', function () {
    $response = Http::get('https://api.coinbase.com/v2/prices/spot?currency=EUR');
    return $response->json();
});

Route::get('/bitcoin/display', [BitcoinController::class, 'display'])->name('bitcoin.display');

Route::post('bitcoin', [BitcoinController::class, 'buyBitcoin'])->name('buy.bitcoin');

Route::get('/myWallet', [WalletController::class, 'myWallet'])->name('myWallet');

Route::get('/bitcoin-chart', function () {
    return view('bitcoin_chart');
});

Route::get('/api/bitcoin-history', [FetchController::class, 'getBitcoinHistory']);

require __DIR__.'/auth.php';
