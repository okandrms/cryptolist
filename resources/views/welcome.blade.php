<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bitcoin App</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" type="image/png" href="{{ asset('assets/Bitcoin.png') }}">
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
            align-items: center;
            width: 90%;
            padding: 20px;
        }

        .header a, .header form {
            margin-bottom: 10px; /* Added margin to separate buttons */
        }
        .header a, .header button {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            color: #fff;
            background-color: #009879;
            transition: background-color 0.3s;
        }
        .header a:hover, .header button:hover {
            background-color: #007965;
        }
        .header a:focus, .header button:focus {
            outline: 2px solid #005f4e;
        }
        .header button {
            border: none;
            cursor: pointer;
        }

        .header a {
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        color: #fff;
        background-color: #009879;
        transition: background-color 0.3s;
        margin-right: 15px;
    }

      .header a:last-child {
    margin-right: 0;
     }

        .content {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
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
            border-radius: 50%;
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
        <div class="header">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="button" type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="auth-link">Log in</a>
                      @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-link">Register</a>
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
