<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data ['barang_keluar'] = BarangKeluar::all();
        return view('BarangKeluar.index', $data);
    }

    public function create()
    {
        $data ['barangs'] = Barang::all();
        return view('BarangKeluar.create' , $data);
    }

    public function store(Request $request)
    {
        // Validasi input sebelum disimpan
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'jumlah_keluar' => 'required|integer', 
            'tujuan' => 'required', 
            'tgl_keluar' => 'required|date', 
            // Tambahkan aturan validasi lain jika diperlukan
        ]);

        // Membuat instance BarangMasuk
        $barangKeluar = new BarangKeluar();
        $barangKeluar->kode_barang = $request->kode_barang;
        $barangKeluar->jumlah_keluar = $request->jumlah_keluar;
        $barangKeluar->tujuan = $request->tujuan;
        $barangKeluar->tgl_keluar = $request->tgl_keluar;
        // Mengisi atribut lain jika ada

        // Simpan data barang masuk ke dalam database
        $barangKeluar->save();

        // Redirect atau berikan respons berhasil jika penyimpanan berhasil
        return redirect()->route('BarangKeluar')->with('success', 'Data barang keluar berhasil ditambahkan');
    }


    public function edit($id)
        {
            $barangKeluar = BarangKeluar::find($id);
            $barangs = Barang::all();

            return view('BarangKeluar.edit', compact('barangKeluar', 'barangs'));
        }

   
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'jumlah_keluar' => 'required|integer', 
            'tujuan' => 'required', 
            'tgl_keluar' => 'required|date', 
            // Tambahkan aturan validasi lain jika diperlukan
        ]);
    
        $barangKeluar = BarangKeluar::find($id);
        $barangKeluar->kode_barang = $request->kode_barang;
        $barangKeluar->jumlah_keluar = $request->jumlah_keluar;
        $barangKeluar->tujuan = $request->tujuan;
        $barangKeluar->tgl_keluar = $request->tgl_keluar;
        // Update atribut lain jika diperlukan
    
        $barangKeluar->save();
    
        return redirect()->route('BarangKeluar')->with('success', 'Data barang keluar berhasil diperbarui');
    }

    public function getNamaBarangByKodeBarang(Request $request)
    {
        $kodeBarang = $request->kode_barang;
        $namaBarang = Barang::where('kode_barang', $kodeBarang)->value('nama_barang');

        return response()->json(['nama_barang' => $namaBarang]);
    }

    public function destroy($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();

        $notification = array(
            'message' => 'Data barang masuk berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('BarangKeluar')->with($notification);
    }

}