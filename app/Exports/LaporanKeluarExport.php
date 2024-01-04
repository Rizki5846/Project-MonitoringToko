<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanKeluarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BarangKeluar::join('barangs', 'barangs.kode_barang', '=', 'barang_keluar.kode_barang')
            ->select(
                'barang_keluar.id',
                'barang_keluar.kode_barang_keluar',
                'barang_keluar.kode_barang',
                'barangs.nama_barang',
                'barang_keluar.jumlah_keluar',
                'barang_keluar.tgl_keluar',
                'barang_keluar.tujuan',
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode Barang Keluar',
            'Kode Barang',
            'Nama Barang',
            'Jumlah Keluar',
            'Tanggal Keluar',
            'Tujuan',
            // Add other column headings as needed
        ];
    }
}