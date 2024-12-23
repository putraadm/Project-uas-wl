<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report to PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            table {page-break-inside: auto;}
            tr {page-break-inside: avoid;page-break-after: auto;}
            thead {display: table-header-group;}
            tfoot {display: table-footer-group;}
            .container{margin: 0 auto; width: 100%; }
            h1 { text-align: center; }
        }
        .container { margin: 0 auto; width: 100%; }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table { width: 100%; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto my-10">
        <h1 class="text-2xl font-bold text-center mb-6">LAPORAN PENJUALAN</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-center font-medium text-gray-700">ID</th>
                        <th class="px-4 py-2 text-center font-medium text-gray-700">Nama Produk</th>
                        <th class="px-4 py-2 text-center font-medium text-gray-700">Nama Pelanggan</th>
                        <th class="px-4 py-2 text-center font-medium text-gray-700">Jumlah Produk</th>
                        <th class="px-4 py-2 text-center font-medium text-gray-700">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="px-4 py-2 text-center">{{ $order->id }}</td>
                            <td class="px-4 py-2 text-center">{{ $order->product->nama_product }}</td>
                            <td class="px-4 py-2 text-center">{{ $order->nama }}</td>
                            <td class="px-4 py-2 text-center">{{ $order->jumlah }}</td>
                            <td class="px-4 py-2 text-center">{{ number_format($order->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-200">
                        <td colspan="3" class="px-4 py-2 text-center font-medium text-gray-700">Total Pendapatan</td>
                        <td class="px-4 py-2 text-center">{{ number_format($orders->sum('jumlah'), 2) }}</td>
                        <td class="px-4 py-2 text-center">{{ number_format($orders->sum('total'), 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>
