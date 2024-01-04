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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
                $table->string('kode_barang_masuk')->unique();
                $table->string('kode_barang');
                $table->integer('jumlah_masuk');
                $table->date('tgl_masuk');
                $table->timestamps();

                // Menambahkan foreign key yang merujuk ke kolom kode_barang di tabel barangs
                $table->foreign('kode_barang')
                    ->references('kode_barang')->on('barangs')
                    ->onDelete('CASCADE') // Mengatur onDelete cascade
                    ->onUpdate('CASCADE'); // Mengatur onUpdate cascade
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
