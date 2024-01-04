<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data ['barang_masuk'] = BarangMasuk::all();
        return view('BarangMasuk.index', $data);
    }

    public function create()
    {
        $data ['barangs'] = Barang::all();
        return view('BarangMasuk.create' , $data);
    }

    public function store(Request $request)
    {
        // Validasi input sebelum disimpan
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'jumlah_masuk' => 'required|integer',
            'tgl_masuk' => 'required|date', // Tambahkan aturan validasi untuk tanggal
            // Tambahkan aturan validasi lain jika diperlukan
        ]);

        // Membuat instance BarangMasuk
        $barangMasuk = new BarangMasuk();
        $barangMasuk->kode_barang = $request->kode_barang;
        $barangMasuk->jumlah_masuk = $request->jumlah_masuk;
        $barangMasuk->tgl_masuk = $request->tgl_masuk;
        $barangMasuk->save();


        return redirect()->route('BarangMasuk')->with('success', 'Data barang masuk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barangMasuk = BarangMasuk::find($id);
        $barangs = Barang::all();

        return view('BarangMasuk.edit', compact('barangMasuk', 'barangs'));
    }


public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'jumlah_masuk' => 'required|integer',
            'tgl_masuk' => 'required|date',
        ]);

        $barangMasuk = BarangMasuk::find($id);
        $barangMasuk->kode_barang = $request->kode_barang;
        $barangMasuk->jumlah_masuk = $request->jumlah_masuk;
        $barangMasuk->tgl_masuk = $request->tgl_masuk;
        $barangMasuk->save();

        return redirect()->route('BarangMasuk')->with('success', 'Data barang keluar berhasil diperbarui');
    }


    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->delete();

        $notification = array(
            'message' => 'Data barang masuk berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('BarangMasuk')->with($notification);
    }
}