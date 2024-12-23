<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $product = Product::all();
        return view('laporan.index', ['dataOrder' => $orders, 'dataProduk' => $product]);
    }
}
