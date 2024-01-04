<?php
namespace App\Http\Controllers;

use App\Exports\LaporanStokExport;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class StokController extends Controller
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
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'jenis' => $barang->jenisBarang->nama,
                'stok_awal' => $stokAwal,
                'jumlah_masuk' => $jumlahMasuk,
                'jumlah_keluar' => $jumlahKeluar,
                'total_stok' => $totalStok,
            ];
        }

        return view('StokBarang.index', compact('data'));
    }

    public function print()
        {
            $barangs = Barang::with('jenisBarang')->get();

            $data = [];
            foreach ($barangs as $barang) {
                $jumlahMasuk = BarangMasuk::where('kode_barang', $barang->kode_barang)->sum('jumlah_masuk');
                $jumlahKeluar = BarangKeluar::where('kode_barang', $barang->kode_barang)->sum('jumlah_keluar');
                $stokAwal = $barang->stok_awal;
                $totalStok = $stokAwal + $jumlahMasuk - $jumlahKeluar;

                $data[] = [
                    'kode_barang' => $barang->kode_barang,
                    'nama_barang' => $barang->nama_barang,
                    'jenis' => $barang->jenisBarang->nama,
                    'stok_awal' => $stokAwal,
                    'jumlah_masuk' => $jumlahMasuk,
                    'jumlah_keluar' => $jumlahKeluar,
                    'total_stok' => $totalStok,
                ];
            }

            // Menggunakan library PDF (contoh menggunakan dompdf)
            $pdf = PDF::loadView('StokBarang.print', compact('data'));

            // Mengatur nama file dan mendownload PDF
            return $pdf->download('laporan_stok_barang.pdf');
}

    
    public function getNamaBarangByKodeBarang(Request $request)
    {
        $kodeBarang = $request->kode_barang;
        $namaBarang = Barang::where('kode_barang', $kodeBarang)->value('nama_barang');

        return response()->json(['nama_barang' => $namaBarang]);
    }

    
    public function export()
    {
        $barangs = Barang::with('jenisBarang')->get();

        $data = [];

        foreach ($barangs as $barang) {
            $jumlahMasuk = BarangMasuk::where('kode_barang', $barang->kode_barang)->sum('jumlah_masuk');
            $jumlahKeluar = BarangKeluar::where('kode_barang', $barang->kode_barang)->sum('jumlah_keluar');
            $stokAwal = $barang->stok_awal;
            $totalStok = $stokAwal + $jumlahMasuk - $jumlahKeluar;

            $data[] = [
                'Kode Barang' => $barang->kode_barang,
                'Nama Barang' => $barang->nama_barang,
                'jenis' => $barang->jenisBarang->nama,
                'Stok Awal' => $stokAwal,
                'Jumlah Masuk' => $jumlahMasuk,
                'Jumlah Keluar' => $jumlahKeluar,
                'Total Stok' => $totalStok,
            ];
        }

        return Excel::download(new LaporanStokExport($data), 'laporan_stok_barang.xlsx');
    }
}