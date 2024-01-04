<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\LaporanMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanMasukExport;

class LaporanMasukController extends Controller
{
    public function index()
    {
        $data ['barang_masuk'] = LaporanMasuk::all();
        return view('LaporanMasuk.index', $data);
    }
    public function getNamaBarangByKodeBarang(Request $request)
    {
        $kodeBarang = $request->kode_barang;
        $namaBarang = Barang::where('kode_barang', $kodeBarang)->value('nama_barang');

        return response()->json(['nama_barang' => $namaBarang]);
    }
    public function print()
    {
        $barangmasuk = BarangMasuk::all();
        $pdf = PDF::loadview('LaporanMasuk.print', ['barang_masuk' => $barangmasuk]);
        return $pdf->download('data_barangmasuk.pdf');
    }
    public function export()
    {
        return Excel::download(new LaporanMasukExport, 'laporanmasuk.xlsx');
    }

}