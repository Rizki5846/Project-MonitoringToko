<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    public function collection()
        {
            return BarangMasuk::with('barang')
                ->select('id', 'kode_barang', 'jumlah_masuk', 'tgl_masuk')
                ->get();
        }

}