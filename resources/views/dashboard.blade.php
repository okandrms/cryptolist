<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bitcoin Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
            background-color: #f3f4f6;
        }
        .header-bg {
            background-image: url('https://example.com/bitcoin-banner.jpg');
            background-size: cover;
            background-position: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-left: 4px solid #009879;
        }
        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card-content {
            padding: 20px;
        }
        h3 {
            color: #009879;
        }
        .balance, .transactions, .price {
            color: #009879;
        }
        .buy-button {
            display: inline-block;
            background-color: #009879;
            color: white;
            padding: 10px 20px;
            margin-left: 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .buy-button:hover {
            background-color: #007965;
        }
        .buy-button:focus {
            outline: 2px solid #005f4e;
        }
    </style>
</head>
<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <div class="header-bg py-12">
                <div class="flex justify-center items-center">
                    <h2 class="font-semibold text-3xl text-white leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                    <a href="{{ url('/bitcoin/display') }}" class="buy-button">Buy</a>
                </div>
            </div>
        </x-slot>

    </x-app-layout>
</body>
</html>
