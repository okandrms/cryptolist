<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitcoinTracker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BitcoinPriceController extends Controller
{
    private $tracker;
    private $eurRate;

    public function __construct()
    {
        // Initialize the BitcoinTracker with a default value or null
        $this->eurRate = null;
        $this->tracker = new BitcoinTracker(); // No need to pass null here
    }

    public function addPurchase(Request $request)
    {
        $amountInEuros = $request->input('amount');
        $bitcoinPriceAtPurchase = $request->input('bitcoin_price');

        $this->tracker->addPurchase($amountInEuros, $bitcoinPriceAtPurchase);

        return response()->json(['message' => 'Purchase added successfully']);
    }

    public function getTotalInvestment()
    {
        return response()->json(['total_investment' => $this->tracker->getTotalInvestment()]);
    }

    public function getTotalBitcoins()
    {
        return response()->json(['total_bitcoins' => $this->tracker->getTotalBitcoins()]);
    }

    public function getCurrentValue()
    {
        // Ensure the current Bitcoin price is up-to-date
        $this->updateCurrentBitcoinPrice();
        return response()->json(['current_value' => $this->tracker->getCurrentValue()]);
    }

    public function getProfitOrLoss()
    {
        // Ensure the current Bitcoin price is up-to-date
        $this->updateCurrentBitcoinPrice();
        return response()->json(['profit_or_loss' => $this->tracker->getProfitOrLoss()]);
    }

    public function updateCurrentBitcoinPrice()
    {
        // Fetch the current Bitcoin price in EUR
        $newBitcoinPrice = $this->getCurrentBitcoinPrice();

        // Check if the fetched price is valid
        if ($newBitcoinPrice !== 0) {
            // Update the current Bitcoin price in the tracker
            $this->tracker->setCurrentBitcoinPrice($newBitcoinPrice);
            $this->eurRate = $newBitcoinPrice; // Also update the local variable

            return response()->json(['message' => 'Bitcoin price updated successfully']);
        } else {
            return response()->json(['error' => 'Failed to update Bitcoin price'], 500);
        }
    }

    public function display()
    {
        // Ensure the current Bitcoin price is up-to-date
        $this->updateCurrentBitcoinPrice();

        $totalInvestment = $this->tracker->getTotalInvestment();
        $totalBitcoins = $this->tracker->getTotalBitcoins();
        $currentValue = $this->tracker->getCurrentValue();
        $profitOrLoss = $this->tracker->getProfitOrLoss();
        $eurRate = $this->eurRate;

        return view('bitcoin', compact('totalInvestment', 'totalBitcoins', 'currentValue', 'profitOrLoss', 'eurRate'));
    }

    // Function to fetch the current Bitcoin price in EUR from the live JSON API
    private function getCurrentBitcoinPrice()
    {
        try {
            $response = Http::get('https://api.coindesk.com/v1/bpi/currentprice.json');
            $data = $response->json();

            // Debugging: Log the API response
            Log::info("API Response: ", [$data]);

            // Get the rate in EUR
            $eur_rate = $data['bpi']['EUR']['rate_float'];

            return $eur_rate;
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching Bitcoin price: '. $e->getMessage());

            // Return a default value or handle the error as needed
            return 0;
        }
    }
}







