<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    public function collection()
        {
            return BarangKeluar::with('barang')
                ->select('id', 'kode_barang', 'jumlah_masuk', 'tgl_masuk')
                ->get();
        }
}