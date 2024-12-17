<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        $kategori = Kategori::all();
        // dd($data);
        return view('produk.index', ['dataProduct' => $data, 'dataKategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->id = $request->id;
        $data->nama_product = $request->nama_product;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->id_kategori = $request->id_kategori;
        $data->save();
        return redirect()->route('kasir.product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $kategori = Kategori::all();
        return view('produk.edit', ['data' => $data, 'kat' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $kategori = Kategori::all();
        $data->nama_product = $request->nama_product;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->id_kategori = $request->id_kategori;
        $data->save();
        return redirect()->route('kasir.product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect('kasir.product');
    }
}
