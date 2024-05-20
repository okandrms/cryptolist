<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wallet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            position: relative;
        }
        .info {
            background-color: #009879;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            width: fit-content;
        }
        .info p {
            margin: 5px 0;
        }
        .info p strong {
            display: inline-block;
            width: 150px;
        }
        .home-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #009879;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
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
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
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
            window.location.href = '/';  // Ana sayfa URL'sini buraya ekleyin
        }
    </script>
</head>
<body>
    <div class="info">
        <p><strong>Total Investment:</strong> 60173848</p>
        <p><strong>Total Bitcoins:</strong> 987.98631053909</p>
        <p><strong>Current Bitcoin Price:</strong> 63932.1708</p>
    </div>
    <button class="home-button" onclick="goToHomePage()">Home</button>
    <h1>My Wallet</h1>
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
</body>
</html>
