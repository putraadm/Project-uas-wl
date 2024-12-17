<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Penjualan') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Laporan Penjualan</h1>
        <form method="GET" action="{{ route('laporan.index') }}">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" id="start_date" name="start_date">
            
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date">
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
        </form>
        <table class="min-w-full bg-white mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID Transaksi</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Total Bayar</th>
                    <th class="px-4 py-2">Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td class="border px-4 py-2">{{ $transaction->id }}</td>
                        <td class="border px-4 py-2">{{ $transaction->transaction_date }}</td>
                        <td class="border px-4 py-2">{{ $transaction->total_bayar }}</td>
                        <td class="border px-4 py-2">{{ $transaction->payment_method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
