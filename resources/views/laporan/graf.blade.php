<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grafik Penjualan') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Grafik Penjualan</h1>
        <canvas id="salesChart"></canvas>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($salesData['labels']) !!},
                datasets: [{
                    label: 'Penjualan',
                    data: {!! json_encode($salesData['data']) !!},
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout> -->
