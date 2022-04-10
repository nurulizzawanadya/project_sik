<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\DetailPengembalianController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengunjungController;
use Carbon\Carbon;

Route::get('/', [AnggotaController::class, 'index'])->name('/');
Route::get('/store-pengunjung/{id}', [PengunjungController::class, 'store'])->name('insert_pengunjung.store');
Route::get('/halaman-admin', function () {
    return view('dashboard');
})->name('/halaman-admin')->middleware('auth');

//peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/insertPeminjaman', [PeminjamanController::class, 'insertPeminjaman'])->name('insertPeminjaman');
Route::get('/edit-peminjaman/{id}', [PeminjamanController::class, 'edit'])->name('editpinjam');
Route::put('/update-peminjaman/{id}', [PeminjamanController::class, 'update'])->name('update.pinjam');
Route::get('/delete/{id}', [PeminjamanController::class, 'delete'])->name('delete.pinjam');

Route::get('/update-perpanjangan/{id}/value', [PeminjamanController::class, 'updatePerpanjangan'])->name('update.perpanjangan');
Route::get('/reset', [PeminjamanController::class, 'reset']);

//detail-peminjaman
Route::get('/detail-peminjaman/{id_peminjaman}', [DetailPeminjamanController::class, 'index']);
Route::post('/insertDetail', [DetailPeminjamanController::class, 'insertDetail'])->name('insertDetail');
Route::get('/cek-pengembalian/{id_peminjaman}', [DetailPeminjamanController::class, 'cek']);
Route::put('/update-detail-peminjaman', [DetailPeminjamanController::class, 'update'])->name('update.detail.pinjam');

//pengembalian
Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::post('/pengembalian/{id}', [PengembalianController::class, 'store'])->name('pengembalian');

//detailpengembalian
Route::get('/detail-pengembalian/{id_pengembalian}', [DetailPengembalianController::class, 'index']);

Route::get('/home', function () {
    return view('dashboard');
})->name('/halaman-admin')->middleware('auth');

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    echo "cache cleared!";
})->name('clear-cache');

Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

