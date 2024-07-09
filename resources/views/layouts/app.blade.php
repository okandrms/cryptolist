<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" type="image/png" href="{{ asset('assets/Bitcoin.png') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.7.0/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@1.0.0/dist/chartjs-adapter-moment.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">


    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header ?? '' }}
            </div>
        </header>



    </div>
    <footer>
        &copy; {{ date('Y') }} Bitcoin App. All rights reserved.
    </footer>
</body>
</html>
