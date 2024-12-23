<x-app-layout>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch the URL and store it in a variable
            var url = "{{ route('laporan.chart') }}";

            // Fetch data from the given URL
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var ctx = document.getElementById('salesChart').getContext('2d');
                    var salesChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Penjualan',
                                data: data.data.map(Number),
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
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
</x-app-layout>
