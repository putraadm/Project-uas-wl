<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice</h1>
    <p>Order ID: {{ $order->id }}</p>
    <p>Nama: {{ $order->nama }}</p>
    <p>Tanggal: {{ $order->created_at }}</p>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product->nama_product }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>Rp{{ number_format($detail->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total Bayar: Rp{{ number_format($totalBayar, 2) }}</p>
</body>
</html>
