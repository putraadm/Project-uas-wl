<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use PHPUnit\Event\TestSuite\Loaded;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $product = Product::all();
        return view('orders.index', ['dataOrder' => $orders, 'dataProduk' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $products = Product::all();
        // return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required|integer',
            'nama' => 'required|string|max:255',
            'id_produk' => 'required|string|max:255',
            'jumlah' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    $produk = Product::find($request->id_produk);
                    if ($produk && $value > $produk->stock) {
                        $fail("Stok tersisa hanya $produk->stock");
                    }
                },
            ],
        ]);
        
        // Lanjutkan proses jika validasi berhasil
        $produk = Product::find($request->id_produk);
        $order = new Order();
        $order->id = $request->id_pesanan;
        $order->product_id = $request->id_produk;
        $order->nama = $request->nama;
        $order->jumlah = $request->jumlah;
        $order->total = $produk->harga * $request->jumlah;
        $order->save();
        
        $produk->stock -= $request->jumlah;
        $produk->save();
        
        return redirect()->route('orders.index')->with('success', 'Order berhasil disimpan');
        
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'id' => 'required|integer',
        //     'nama' => 'required|string|max:255',
        //     'id_produk' => 'required|string|max:255',
        //     'jumlah' => 'required|numeric',
        // ]);
        
        // if ($validator->fails()) {
        //     return redirect()->route('orders.index')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        
        // $produk = Product::find($request->id_produk);
        // if($produk->stock >= $request->jumlah){
        //     $order = new Order();
        //     $order->id = $request->id_pesanan;
        //     $order->product_id = $request->id_produk;
        //     $order->nama = $request->nama;
        //     $order->jumlah = $request->jumlah;
        //     $order->total = $produk->harga * $request->jumlah; 
        //     $order->save();
        //     $produk->stock -= $request->jumlah;
        //     $produk->save();
        //     return redirect()->route('orders.index')->with('success', 'Order berhasil disimpan');
        // } else {
        //     return redirect()->route('orders.index')->with('error', "Stok tersisa hanya $produk->stock")->withInput();
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $orderDetails = $order->orderDetails;
        return view('orders.show', compact('order', 'orderDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function exportPdf(){
        $orders = Order::all();
        $pdf = Pdf::loadView('laporan.exportPdf', compact('orders'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('laporan.pdf', [
            'Attachment' => false,
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="laporan.pdf"'
        ]);
    }

    

    public function chart() { 
        $orders = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')->groupBy('date')->orderBy('date', 'asc')->get();
        $salesData = [
            'labels' => $orders->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('M');
            }),
            'data' => $orders->pluck('total')
        ]; 
        return response()->json($salesData);
    }

    public function grafik(){
        $total_harga = Order::select(DB::raw("CAST(SUM(total) AS SIGNED) as total_harga"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck("total_harga");

        $bulan = Order::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck("bulan");

        // dd($total_harga, $bulan);

        return view('owner.graph', compact('total_harga', 'bulan'));
    }
}
