<?php

namespace App\Models;

class BitcoinTracker
{
    private $purchases = [];
    private $currentBitcoinPrice;

    public function __construct()
    {
        $this->currentBitcoinPrice = null;
    }

    public function addPurchase($amountInEuros, $bitcoinPriceAtPurchase)
    {
        $bitcoinsPurchased = bcdiv($amountInEuros, $bitcoinPriceAtPurchase, 8);
        $this->purchases[] = [
            'amountInEuros' => $amountInEuros,
            'bitcoinPriceAtPurchase' => $bitcoinPriceAtPurchase,
            'bitcoinsPurchased' => $bitcoinsPurchased
        ];
    }

    public function getTotalInvestment()
    {
        $totalInvestment = '0.00000000';
        foreach ($this->purchases as $purchase) {
            $totalInvestment = bcadd($totalInvestment, $purchase['amountInEuros'], 8);
        }
        return $totalInvestment;
    }

    public function getTotalBitcoins()
    {
        $totalBitcoins = '0.00000000';
        foreach ($this->purchases as $purchase) {
            $totalBitcoins = bcadd($totalBitcoins, $purchase['bitcoinsPurchased'], 8);
        }
        return $totalBitcoins;
    }

    public function getCurrentValue()
    {
        return bcmul($this->getTotalBitcoins(), $this->currentBitcoinPrice, 8);
    }

    public function getProfitOrLoss()
    {
        return bcsub($this->getCurrentValue(), $this->getTotalInvestment(), 8);
    }

    public function setCurrentBitcoinPrice($newBitcoinPrice)
    {
        if ($newBitcoinPrice > 0) {
            $this->currentBitcoinPrice = $newBitcoinPrice;
        } else {
            throw new \InvalidArgumentException('Bitcoin price must be greater than zero.');
        }
    }
}
