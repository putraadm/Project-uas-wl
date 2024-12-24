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
        $data = Product::with('kategori')->get();
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
        $request->validate([
            'id' => 'required|integer',
            'nama_product' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|integer', 
            'id_kategori' => 'required|integer',
        ]);
        
        $data = new Product();
        $data->id = $request->id;
        $data->nama_product = $request->nama_product;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->id_kategori = $request->id_kategori;
        $data->save();
        return redirect()->route('kasir.product')->with('success', 'Data Berhasil Disimpan');
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
        $request->validate([
            'id' => 'required|integer',
            'nama_product' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|integer', 
            'id_kategori' => 'required|integer',
        ]);
        
        $data = Product::find($id);
        // $kategori = Kategori::all();
        $data->nama_product = $request->nama_product;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->id_kategori = $request->id_kategori;
        $data->save();
        return redirect()->route('kasir.product')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('kasir.product')->with('success', 'Data Berhasil Dihapus');
    }
}
