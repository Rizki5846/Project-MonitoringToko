<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk'; // Sesuaikan dengan nama tabel yang ada di basis data
    protected $fillable = [
        'kode_barang',
        'jumlah_masuk',
        'tgl_masuk'

        // Atribut lain yang dapat diisi secara massal (fillable)
    ];
    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($barang_masuk) {
            $lastBarangMasuk = static::orderBy('kode_barang_masuk', 'desc')->first(); // Ambil barang masuk terakhir berdasarkan id

            if ($lastBarangMasuk) {
                $lastNumber = intval(substr($lastBarangMasuk->kode_barang_masuk, 5));
                $nextNumber = $lastNumber + 1;
                $barang_masuk->kode_barang_masuk = 'BM' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
            } else {
                $barang_masuk->kode_barang_masuk = 'BM-0001'; // Jika belum ada barang masuk
            }
        });
    }
}
