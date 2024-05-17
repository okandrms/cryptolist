<?php

namespace App\Models;

class BitcoinTracker
{
    private $purchases = [];
    private $currentBitcoinPrice;

    public function __construct()
    {
        // Initialize properties
        $this->currentBitcoinPrice = null;
    }

    public function addPurchase($amountInEuros, $bitcoinPriceAtPurchase)
    {
        $bitcoinsPurchased = $amountInEuros / $bitcoinPriceAtPurchase;
        $this->purchases[] = [
            'amountInEuros' => $amountInEuros,
            'bitcoinPriceAtPurchase' => $bitcoinPriceAtPurchase,
            'bitcoinsPurchased' => $bitcoinsPurchased
        ];
    }

    public function getTotalInvestment()
    {
        $totalInvestment = 0;
        foreach ($this->purchases as $purchase) {
            $totalInvestment += $purchase['amountInEuros'];
        }
        return $totalInvestment;
    }

    public function getTotalBitcoins()
    {
        $totalBitcoins = 0;
        foreach ($this->purchases as $purchase) {
            $totalBitcoins += $purchase['bitcoinsPurchased'];
        }
        return $totalBitcoins;
    }

    public function getCurrentValue()
    {
        return $this->getTotalBitcoins() * $this->currentBitcoinPrice;
    }

    public function getProfitOrLoss()
    {
        return $this->getCurrentValue() - $this->getTotalInvestment();
    }

    // Method to update the current Bitcoin price
    public function setCurrentBitcoinPrice($newBitcoinPrice)
    {
        if ($newBitcoinPrice > 0) { // Simple validation
            $this->currentBitcoinPrice = $newBitcoinPrice;
        } else {
            throw new \InvalidArgumentException('Bitcoin price must be greater than zero.');
        }
    }
}


