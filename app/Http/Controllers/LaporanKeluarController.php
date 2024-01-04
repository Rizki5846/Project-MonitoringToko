<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanKeluarExport;

use App\Models\BarangKeluar;
use App\Models\LaporanKeluar;

class LaporanKeluarController extends Controller
{
    public function index()
    {
        $data ['barang_keluar'] = LaporanKeluar::all();
        return view('LaporanKeluar.index', $data);
    }
    public function getNamaBarangByKodeBarang(Request $request)
    {
        $kodeBarang = $request->kode_barang;
        $namaBarang = Barang::where('kode_barang', $kodeBarang)->value('nama_barang');

        return response()->json(['nama_barang' => $namaBarang]);
    }
    public function print()
    {
        $barangkeluar = BarangKeluar::all();
        $pdf = PDF::loadview('Laporankeluar.print', ['barang_keluar' => $barangkeluar]);
        return $pdf->download('data_barangkeluar.pdf');
    }
    public function export()
    {
        return Excel::download(new LaporanKeluarExport, 'laporankeluar.xlsx');
    }
}