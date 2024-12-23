<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-white shadow-md rounded-lg">
                    <div class="card-header bg-blue-500 text-white text-center py-2 rounded-t-lg">
                        Grafik Pendapatan Bulanan
                    </div>
                    <div class="card-body p-4">
                        <div id="grafik"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var pendapatan = @json($total_harga);
        var bulan = @json($bulan);
        Highcharts.chart('grafik', {
            title: {
                text: 'Grafik Pendapatan Bulanan'
            },
            xAxis: {
                categories: bulan
            },
            yAxis: {
                title: {
                    text: 'Nominal Pendapatan Bulanan'
                }
            },
            series: [{
                name: 'Nominal Pendapatan',
                data: pendapatan
            }]
        });
    </script>
</x-app-layout>
