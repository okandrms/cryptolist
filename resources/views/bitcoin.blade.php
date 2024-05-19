

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin Tracker</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1 class="title">Bitcoin Tracker</h1>
    <h2>Our price of BTC at the moment: {{ $currentBitcoinPrice }}</h2>
  

    <div>
    <form method="POST" action="{{ route('buy.bitcoin') }}">
    @csrf
    <table class="styled-table">
    <tr>
        <th>Amount (€)</th>
        <th>BTC price</th>
        <th>BTC amount</th>
        <th></th> 
        <th></th> 
    </tr>
    <tr>
        <td><input class="form-control" onkeyup="calculate()" type="number" name="amount"></td>
        <td><input type="number" disabled name="btcPrice" value="{{ $currentBitcoinPrice }}"></td>
        <td><input type="number" disabled name="btcAmount" value=""></td>        
        <td><button type="submit"  class="btn save-btn">Buy</button></td> 
    </tr>
     
</table>

  <h2>All Transactions</h2>
    <table  class="styled-table">
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
  <script>
    function calculate() {
      let amount = document.getElementsByName('amount')[0].value;
      let btcPrice = document.getElementsByName('btcPrice')[0].value;
      let btcAmount = amount/btcPrice;
      document.getElementsByName('btcAmount')[0].value = btcAmount;
    }   

  </script>
</body>
</html>



