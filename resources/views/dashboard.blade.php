<title>Dashboard</title>

<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            <div class="container">
                <div class="header-content">
                    <h2>{{ __('Dashboard') }}</h2>
                    <a href="{{ url('/bitcoin/display') }}" class="buy-button">Buy Bitcoin</a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container main-content">
        <div class="card">
            <h3>Balance</h3>
            <p>Current balance: {{ $totalInvestment }}</p>
            <a href="{{ url('/myWallet') }}" class="buy-button">View Details</a>
        </div>
        <div class="card">
            <h3>Transactions</h3>
            <p>{{ $totalBitcoins }}</p>
            <a href="{{ url('/myWallet') }}" class="buy-button">View History</a>
        </div>
        <div class="card">
            <h3>Bitcoin Price</h3>
            <p>Current price: {{ $currentBitcoinPrice }}</p>
            <a href="{{ url('/bitcoin-chart') }}" class="buy-button">View Chart</a>
        </div>
    </div>
</x-app-layout>
