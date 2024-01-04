<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->unsignedBigInteger('jenis_barang_id');
            $table->integer('harga');
            $table->string('cover')->nullable();
            $table->integer('stok_awal')->default(0); // Kolom stok_awal ditambahkan
            $table->timestamps();
        
            $table->foreign('jenis_barang_id')->references('id')->on('jenis_barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
