<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        // $order->product_name = Product::find($request->product_id)->nama_product;
        $order->nama = $request->nama;
        $order->jumlah = $request->jumlah;
        $order->total = Product::find($request->product_id)->harga * $request->jumlah; 
        $order->save();

        return redirect()->route('orders.index');
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
}
