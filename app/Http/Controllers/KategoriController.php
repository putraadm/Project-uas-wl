<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::all();
            return view('kategori.index', ['dataKategori' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('kategori.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Kategori();
        $data->id = $request->id;
        $data->nama_kategori = $request->nama_kategori;
        $data->save();
        return redirect()->route('kasir.kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('kategori.edit' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Kategori::find($id);
        $data->nama_kategori = $request->nama_kategori;
        $data->update();
        return redirect()->route('kasir.kategori', );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kategori::find($id);
        $data->delete();
        return redirect()->route('kasir.kategori');
    }
}
