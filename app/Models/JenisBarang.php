<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;
    protected $table = 'jenis_barangs'; // Sesuaikan dengan nama tabel yang ada di basis data
    protected $fillable = [
        'nama',


        // Atribut lain yang dapat diisi secara massal (fillable)
    ];
}