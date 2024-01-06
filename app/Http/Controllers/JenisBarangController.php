<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    public function index()
    {
        $data ['jenis_barangs'] = JenisBarang::all();
        return view('JenisBarang.index', $data);
    }

    public function create()
    {
        $data ['jenis_barangs'] = JenisBarang::all();
        return view('JenisBarang.create' , $data);
    }

    public function store(Request $request)
    {
        // Validasi input sebelum disimpan
        $validatedData = $request->validate([
            'nama' => 'required',

            // Tambahkan aturan validasi lain jika diperlukan
        ]);

        // Membuat instance BarangMasuk
        $JenisBarang = new JenisBarang();
        $JenisBarang->nama = $request->nama;
        

        // Simpan data barang masuk ke dalam database
        $JenisBarang->save();

        // Redirect atau berikan respons berhasil jika penyimpanan berhasil
        return redirect()->route('JenisBarang')->with('success', 'Data barang keluar berhasil ditambahkan');
    }


   
    
}
