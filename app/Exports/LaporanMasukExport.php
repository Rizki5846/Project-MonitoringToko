<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanMasukExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BarangMasuk::join('barangs', 'barangs.kode_barang', '=', 'barang_masuk.kode_barang')
            ->select(
                'barang_masuk.id',
                'barang_masuk.kode_barang_masuk',
                'barang_masuk.kode_barang',
                'barangs.nama_barang',
                'barang_masuk.jumlah_masuk',
                'barang_masuk.tgl_masuk'
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode Barang Masuk',
            'Kode Barang',
            'Nama Barang',
            'Jumlah Masuk',
            'Tanggal Masuk',
            // Add other column headings as needed
        ];
    }
}