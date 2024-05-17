<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FetchController;

class BitcoinController extends Controller
{
    public function display () {

       

       $currentBitcoinPrice = FetchController::getBitcoinPrice();
       // dd($currentBitcoinPrice);

       $totalInvestment = 0;
       $totalBitcoins = 0;
       $currentValue = 0;
       $profitOrLoss = 0;
       $eurRate = 0;

       return view('bitcoin', compact('currentBitcoinPrice','totalInvestment', 'totalBitcoins', 'currentValue', 'profitOrLoss', 'eurRate'));
    }
}
