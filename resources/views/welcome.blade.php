<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
            overflow: hidden;
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
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }
        .header img {
            height: 50px;
            margin-right: 15px;
        }
        .header h1 {
            color: #009879;
        }
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            position: relative;
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


    <x-app-layout>
        <div class="header">

            <h1>Welcome to Bitcoin Tracker App</h1>
        </div>

        <div class="container">
            <div class="content">
                <img src="{{ asset('assets/Bitcoinn.jpg') }}" alt="Coin Image" class="coin-image">
                <p>Your one-stop solution for managing your Bitcoin transactions.</p>
                <a href="{{ url('/bitcoin-chart') }}" class="button">View Bitcoin Chart</a>
            </div>

        </div>
    </x-app-layout>
</body>
</html>
