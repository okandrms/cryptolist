<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin Tracker</title>
</head>
<body>
    <h1>Bitcoin Tracker</h1>
    <h2>Our price of BTC at the momen: {{ $currentBitcoinPrice }}</h2>
    <div>
        <p>Total investment: {{ $totalInvestment }} euro</p>
        <p>Total Bitcoins: {{ $totalBitcoins }}</p>
        <p>Current value: {{ $currentValue }} euro</p>
        <p>Profit/loss: {{ $profitOrLoss }} euro</p>
        <p>Current Bitcoin price: {{ $eurRate }} euro</p>
    </div>
</body>
</html>



