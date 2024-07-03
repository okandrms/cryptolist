<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin Tracker</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
        }
        .header-bg {
            background-image: url('https://example.com/bitcoin-banner.jpg');
            background-size: cover;
            background-position: center;
            padding: 20px 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            color: white;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }
        h2 {
            margin: 0;
            font-size: 2rem;
        }
        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            width: 100%;
            justify-content: center;
            margin-top: 10px;
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-left: 4px solid #009879;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 20px);
            max-width: calc(33.333% - 20px);
            min-width: 280px;
            box-sizing: border-box;
        }
        .card h3 {
            color: #009879;
            margin: 0 0 5px;
            font-size: 1.5rem;
        }
        .buy-button {
            display: inline-block;
            background-color: #009879;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
            margin-top: 5px;
        }
        .buy-button:hover {
            background-color: #007965;
        }
        .buy-button:focus {
            outline: 2px solid #005f4e;
        }
        footer {
            margin-top: auto;
            background-color: #009879;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
        .button-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #009879;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .button-container button:hover {
            background-color: #00735e;
        }
        .alert {
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
            border-radius: 10px 10px 0 0;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .styled-table th, .styled-table td {
            padding: 12px 15px;
        }
        .styled-table th {
            background-color: #009879;
            color: #ffffff;
            text-align: center;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f4f6;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .button {
            display: inline-block;
            background-color: #009879;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
            margin-top: 5px;
        }
        .button:hover {
            background-color: #007965;
        }
        .button:focus {
            outline: 2px solid #005f4e;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-content">
            <h2>Bitcoin Tracker</h2>
            <div class="button-container">
                <a href="{{ url('/') }}"><button class="button">Home</button></a>
                <a href="{{ url('/myWallet') }}"><button class="button">My Wallet</button></a>
            </div>
        </div>
        <div class="main-content">
            <div class="card">
                <h3>Bitcoin Price</h3>
                <p>Our price of BTC at the moment: {{ $currentBitcoinPrice }}</p>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('buy.bitcoin') }}">
                @csrf
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Amount (€)</th>
                            <th>BTC price</th>
                            <th>BTC amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control" onkeyup="calculate()" type="number" name="amount"></td>
                            <td><input type="number" disabled name="btcPrice" value="{{ $currentBitcoinPrice }}"></td>
                            <td><input type="number" disabled name="btcAmount" value=""></td>
                            <td><button type="submit" class="btn save-btn">Buy</button></td>
                        </tr>
                    </tbody>
                </table>
                <h2>All Transactions</h2>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>BTC Price</th>
                            <th>BTC Amount</th>
                            <th>Crypto Wallet ID</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->price_per_unit }}</td>
                                <td>{{ number_format($transaction->btc_amount, 20, '.', '') }}</td>
                                <td>{{ $transaction->crypto_wallet_id }}</td>
                                <td>{{ $transaction->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <footer>
        &copy; 2024 Bitcoin Tracker. All rights reserved.
    </footer>
    <script>
        function calculate() {
            let amount = document.getElementsByName('amount')[0].value;
            let btcPrice = document.getElementsByName('btcPrice')[0].value;

            if (!amount || amount == 0) {
                document.getElementsByName('btcAmount')[0].value = "";
                return;
            }

            let btcAmount = amount / btcPrice;
            document.getElementsByName('btcAmount')[0].value = btcAmount;
        }
    </script>
</body>
</html>
