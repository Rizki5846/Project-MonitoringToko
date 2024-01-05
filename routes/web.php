<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanKeluarController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::get('/create-user', [UserController::class, 'createUser']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');
});

Route::middleware('auth')->group(function () {
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/barang/{id}/edit',[BarangController::class, 'edit'])->name('barang.edit');
    Route::match(['put', 'patch'], '/barang/{id}',[BarangController::class, 'update'])->name('barang.update');
});
//barang masuk
Route::middleware('auth')->group(function () {

    Route::get('/BarangMasuk', [BarangMasukController::class, 'index'])->name('BarangMasuk');
    Route::get('/BarangMasuk/create', [BarangMasukController::class, 'create'])->name('BarangMasuk.create');
    Route::post('/BarangMasuk', [BarangMasukController::class, 'store'])->name('BarangMasuk.store');
    Route::delete('/BarangMasuk/{id}', [BarangMasukController::class, 'destroy'])->name('BarangMasuk.destroy');
    Route::get('/BarangMasuk/{id}/edit',[BarangMasukController::class, 'edit'])->name('BarangMasuk.edit');
    Route::match(['put', 'patch'], '/BarangMasuk/{id}',[BarangMasukController::class, 'update'])->name('BarangMasuk.update');
    Route::get('/get-nama-barang', [BarangMasukController::class, 'getNamaBarangByKodeBarang']);
});

Route::middleware('auth')->group(function () {
    Route::get('/BarangKeluar', [BarangKeluarController::class, 'index'])->name('BarangKeluar');
    Route::get('/BarangKeluar/create', [BarangKeluarController::class, 'create'])->name('BarangKeluar.create');
    Route::post('/BarangKeluar', [BarangKeluarController::class, 'store'])->name('BarangKeluar.store');
    Route::delete('/BarangKeluar/{id}', [BarangKeluarController::class, 'destroy'])->name('BarangKeluar.destroy');
    Route::get('/BarangKeluar/{id}/edit',[BarangKeluarController::class, 'edit'])->name('BarangKeluar.edit');
    Route::match(['put', 'patch'], '/BarangKeluar/{id}',[BarangKeluarController::class, 'update'])->name('BarangKeluar.update');
    Route::get('/get-nama-barang', [BarangKeluarController::class, 'getNamaBarangByKodeBarang']);  
});

Route::middleware('auth')->group(function () {
    Route::get('/LaporanKeluar', [LaporanKeluarController::class, 'index'])->name('LaporanKeluar');
    Route::get('/LaporanKeluar/print', [LaporanKeluarController::class, 'print'])->name('barangkeluar.print');
    Route::get('/LaporanKeluar/export', [LaporanKeluarController::class, 'export'])->name('barangkeluar.export'); 
});
//laporan masuk
Route::middleware('auth')->group(function () {
    Route::get('/LaporanMasuk', [LaporanMasukController::class, 'index'])->name('LaporanMasuk');
    Route::get('/Laporanmasuk/print', [LaporanMasukController::class, 'print'])->name('barangmasuk.print');
    Route::get('/Laporanmasuk/export', [LaporanMasukController::class, 'export'])->name('barangmasuk.export');
});
//Laporan Stok
Route::middleware('auth')->group(function () {
    Route::get('/StokBarang', [StokController::class, 'index'])->name('StokBarang');
    Route::get('/StokBarang/print', [StokController::class, 'print'])->name('StokBarang.print');
    Route::get('/StokBarang/export', [StokController::class, 'export'])->name('StokBarang.export');
});





