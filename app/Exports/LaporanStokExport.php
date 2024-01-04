<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanStokExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Jenis Barang',
            'Stok Awal',
            'Jumlah Masuk',
            'Jumlah Keluar',
            'Total Stok'
        ];
    }
}