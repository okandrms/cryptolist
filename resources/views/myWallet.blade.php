<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wallet</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/Bitcoin.png') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .info {
            background-color: #009879;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .info p {
            margin: 5px 0;
            font-size: 1.2rem;
        }
        .info p strong {
            display: inline-block;
            width: 200px;
        }
        .home-button {
            background-color: #fff;
            color: #009879;
            border: 2px solid #009879;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
            margin-top: 20px;
            align-self: center;
        }
        .home-button:hover {
            background-color: #007965;
            color: white;
        }
        h1 {
            color: #009879;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #009879;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        function goToHomePage() {
            window.location.href = '/';
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>My Wallet</h1>
        <div class="info">
            <p><strong>Total Investment:</strong> {{$totalInvestment}}</p>
            <p><strong>Total Bitcoins:</strong> {{$totalBitcoins}}</p>
            <p><strong>Current Bitcoin Price:</strong> {{$currentBitcoinPrice}}</p>
            <button class="home-button" onclick="goToHomePage()">Home</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Bitcoin Amount</th>
                    <th>Price per Bitcoin</th>
                    <th>Current Value</th>
                    <th>Profit/Loss</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allTransactions as $transaction)
                    <tr>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->btc_amount }}</td>
                        <td>{{ $transaction->price_per_unit }}</td>
                        <td>{{ $transaction->current_value }}</td>
                        <td>{{ $transaction->profit_or_loss }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
