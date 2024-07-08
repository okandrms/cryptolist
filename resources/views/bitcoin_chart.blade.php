<x-app-layout>
    <x-slot name="header">
        <div class="header-bg">
            <div class="container">
                <div class="header-content">
                    <h2>{{ __('Bitcoin Chart') }}</h2>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container main-content">
        <div class="w-full overflow-hidden">
            <canvas id="bitcoinChart" class="w-full h-64"></canvas>
        </div>
    </div>

    <script>
        fetch('/api/bitcoin-history')
            .then(response => response.json())
            .then(data => {
                const dates = Object.keys(data);
                const prices = Object.values(data);

                const ctx = document.getElementById('bitcoinChart').getContext('2d');
                const bitcoinChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [{
                            label: 'Bitcoin Price (EUR)',
                            data: prices,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day'
                                }
                            }
                        }
                    }
                });
            });
    </script>
</x-app-layout>


