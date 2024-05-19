<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bitcoin App</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            background-image: url('https://kointimes.net/wp-content/uploads/2022/04/source-istock-koonsiri-boonnak.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            overflow:hidden;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .header {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            padding: 20px;
        }
        .header a {
            margin-right: 20px;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            color: #fff;
            background-color: #009879; 
            transition: background-color 0.3s;
        }
        .header a:hover {
            background-color: #007965; 
        }
        .header a:focus {
            outline: 2px solid #005f4e; 
        }
        .content {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8); /* Sayfa içeriğine yarı saydamlık eklemek için */
            padding: 20px;
            border-radius: 10px;
        }
        footer {
            margin-top: auto;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .coin-image {
            width: 250px; 
            height: 250px; 
            margin-bottom: 50px;
            border-radius: 50%; /* Kenarları yuvarlak yapmak için */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
        <div class="content">
            <img src="https://www.egehaber.com/wp-content/uploads/2021/09/analist-kacirmayin-bu-3-altcoin-gelecek-vaat-ediyor-K9rtabc6.jpg" alt="Coin Image" class="coin-image">
            <h1>Welcome to BlackSmits Coin App</h1>
            <p>Your one-stop solution for managing your Bitcoin transactions.</p>
        </div>
        <footer>
            &copy; {{ date('Y') }} Bitcoin App. All rights reserved.
        </footer>
    </div>
</body>
</html>
