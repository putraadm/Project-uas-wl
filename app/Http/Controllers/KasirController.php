<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index(){
        $data = Product::with('kategori')->get();
        $kategori = Kategori::all();
        return view('produk.index', ['dataProduct' => $data, 'dataKategori' => $kategori]);
    }
}
