<?php

namespace App\Http\Controllers;

use App\Models\Desain;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardDesainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desain = Desain::with('produk')->orderBy('created_at', 'DESC')->paginate(5);
return view('dashboard.desain.index', [
    'title' => 'Dashboard | Desain',
    'desains' => $desain,
]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
{
    $produk = Produk::all();

    return view('dashboard.desain.tambah', [
        'title' => 'Dashboard | Tambah Desain',
        'produk' => $produk,
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
        'nama_pelanggan' => 'required|max:255',
        'produk_id' => 'required|numeric',
        'tinggi' => 'required|numeric',
        'lebar' => 'required|numeric',
        'harga' => 'required|numeric',
        'keterangan' => 'required|max:255',
    ]);

    $desain = Desain::create($data);

    return redirect('dashboard/desain')->with('success', 'Desain untuk ' . $desain->nama_pelanggan . ' berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $desain = Desain::find($id);
$produk = $desain->produk; // Jika relasi antara Desain dan Produk sudah diatur dengan benar

return view('dashboard.desain.lihat', [
    'title' => 'Dashboard | Lihat Desain',
    'desains' => $desain,
    'produk' => $produk, // Mengirim produk terkait desain ke view
]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desains = Desain::find($id);
 $produk = Produk::all();
         return view('dashboard.desain.edit', [
            'title' => 'Dashboard | Edit Desain',
            'desains' => $desains,
            'produk' => $produk, // Mengirim produk terkait desain ke view
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
    $desain = Desain::findOrFail($id);

    $data = $request->validate([
        'nama_pelanggan' => 'required|max:255',
        'produk_id' => 'required|numeric',
        'tinggi' => 'required|numeric',
        'lebar' => 'required|numeric',
        'harga' => 'required|numeric',
        'keterangan' => 'required|max:255',
    ]);

    $desain->update($data);

    return redirect('dashboard/desain')->with('success', 'Desain untuk ' . $desain->nama_pelanggan . ' berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desains = Desain::find($id);
        $desains->delete();
        return redirect('dashboard/desain')->with('success', 'Desain '.$desains->nama_pelanggan.' berhasil dihapus.');
    }

    public function getHargaProduk($id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            return response()->json(['success' => true, 'harga' => $produk->harga]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
