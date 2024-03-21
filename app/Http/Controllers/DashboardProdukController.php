<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::OrderBy('created_at', 'DESC')->paginate(5);
        return view ('dashboard.produk.index', [
            'title' => 'Dashboard | Produk',
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.produk.tambah', [
            'title' => 'Dashboard | Tambah Produk',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'nama_produk' => 'required|max:255',
        'tinggi' => 'required|numeric',
        'lebar' => 'required|numeric',
        'harga' => 'required|numeric',
    ]);

    $produks = Produk::create($data);

    return redirect('dashboard/produk')->with('success', $produks->nama_produk . ' berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $produks = Produk::find($id);
        return view('dashboard.produk.edit', [
            'title' => 'Dashboard | Edit Produk',
            'produks' => $produks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

    $data = $request->validate([
        'nama_produk' => 'required|max:255',
        'tinggi' => 'required|numeric',
        'lebar' => 'required|numeric',
        'harga' => 'required|numeric',
    ]);

    $produk->update($data);

    return redirect('dashboard/produk')->with('success', $produk->nama_produk . ' berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $produks = Produk::find($id);
        $produks->delete();
        return redirect('dashboard/produk')->with('success', $produks->nama_produk .' berhasil dihapus.');
    }

}
