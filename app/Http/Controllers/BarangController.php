<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
   public function index()
    {
        $barangs = Barang::with('jenisBarang')->get();

        $data = [];
        foreach ($barangs as $barang) {
            $jumlahMasuk = BarangMasuk::where('kode_barang', $barang->kode_barang)->sum('jumlah_masuk');
            $jumlahKeluar = BarangKeluar::where('kode_barang', $barang->kode_barang)->sum('jumlah_keluar');
            $stokAwal = $barang->stok_awal;
            $totalStok = $stokAwal + $jumlahMasuk - $jumlahKeluar;

            $data[] = [
                'id' =>  $barang->id,
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'jenis' => $barang->jenisBarang->nama,
                'harga' => $barang->harga,
                'cover' => $barang->cover,
                'total_stok' => $totalStok,
            ];
        }

        return view('barang.index', compact('data'));
    }
    public function create()
    {
        $jenisBarangs = JenisBarang::all();
        return view('barang.create', compact('jenisBarangs'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_barang' => 'required|max:255',
        'jenis_barang_id' => 'required|max:150',
        'harga' => 'required|numeric',
   
        'cover' => 'nullable|image',
        ]);
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->storeAs(
            'public/cover_barang',
            'cover_barang_'.time() . '.' . $request->file('cover')->extension()
            );
            $validated['cover'] = basename($path);
        }

        Barang::create($validated);
        $notification = array(
            'message' => 'Data buku berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if($request->save == true) {
            return redirect()->route('barang')->with($notification);
        } else {
        return redirect()->route('barang.create')->with($notification);
        }
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        $jenisBarangs = JenisBarang::all();
    
        return view('barang.edit', compact('barang', 'jenisBarangs'));
    }

    public function update(Request $request, string $id)
{
    $barang = Barang::find($id);
    $validated = $request->validate([
        'nama_barang' => 'required|max:255',
        'jenis_barang_id' => 'required|max:150',
        'harga' => 'required|numeric',
        'cover' => 'nullable|image',
    ]);

    if ($request->hasFile('cover')) {
        $path = $request->file('cover')->storeAs(
            'public/cover_barang',
            'cover_barang_' . time() . '.' . $request->file('cover')->extension()
        );
        $validated['cover'] = basename($path);
    }

    $barang->update($validated);
    
    $notification = [
        'message' => 'Data barang berhasil diperbaharui',
        'alert-type' => 'success'
    ];

    return redirect()->route('barang')->with($notification);
}


    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        $notification = array(
            'message' => 'Data barang berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('barang')->with($notification);
    }
    
}