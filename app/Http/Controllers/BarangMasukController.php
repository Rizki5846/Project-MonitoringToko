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
        // Mengisi atribut lain jika ada

        // Simpan data barang masuk ke dalam database
        $barangMasuk->save();

        // Redirect atau berikan respons berhasil jika penyimpanan berhasil
        return redirect()->route('BarangMasuk')->with('success', 'Data barang masuk berhasil ditambahkan');
    }

}
