<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar'; // Sesuaikan dengan nama tabel yang ada di basis data
    protected $fillable = [
        'kode_barang',
        'jumlah_keluar',
        'tujuan',
        'tgl_keluar'

        // Atribut lain yang dapat diisi secara massal (fillable)
    ];
    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($barang_keluar) {
            $lastBarangKeluar = static::orderBy('kode_barang_keluar', 'desc')->first(); // Ambil barang masuk terakhir berdasarkan id

            if ($lastBarangKeluar) {
                $lastNumber = intval(substr($lastBarangKeluar->kode_barang_keluar, 5));
                $nextNumber = $lastNumber + 1;
                $barang_keluar->kode_barang_keluar = 'BK-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
            } else {
                $barang_keluar->kode_barang_keluar = 'BK-0001'; // Jika belum ada barang masuk
            }
        });
    }
}