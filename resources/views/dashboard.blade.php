<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bitcoin Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
            border-left: 4px solid #009879; /* Kartların sol kenarına renk ekledik */
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
            color: #009879; /* Başlık rengini değiştirdik */
        }
        .balance, .transactions, .price {
            color: #009879; /* Önemli bilgileri renklendirdik */
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
                    <a href="{{ url('/bitcoin/display') }}" class="buy-button">Buy</a> <!-- Buy butonu güncellendi -->
                </div>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="main-content">
                    <div class="card w-full lg:w-1/3 p-6 shadow-sm rounded-lg">
                        <div class="card-content text-gray-900 dark:text-gray-100">
                            <h3 class="font-bold text-xl">Account Balance</h3>
                            <p class="balance text-2xl mt-4">$10,000</p>
                        </div>
                    </div>
                    <div class="card w-full lg:w-1/3 p-6 shadow-sm rounded-lg">
                        <div class="card-content text-gray-900 dark:text-gray-100">
                            <h3 class="font-bold text-xl">Recent Transactions</h3>
                            <ul class="transactions mt-4">
                                <li>- $200 (Sent)</li>
                                <li>+ $1,000 (Received)</li>
                                <li>- $50 (Sent)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card w-full lg:w-1/3 p-6 shadow-sm rounded-lg">
                        <div class="card-content text-gray-900 dark:text-gray-100">
                            <h3 class="font-bold text-xl">Bitcoin Price</h3>
                            <p class="price text-2xl mt-4">$45,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
