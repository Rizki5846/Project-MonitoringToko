<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LaporanKeluarController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::view('/roles', 'role')->name('role')->middleware(['role:admin']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//barang
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

require __DIR__.'/auth.php';
