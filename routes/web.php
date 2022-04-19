<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\DetailPengembalianController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\BukuController;
use Carbon\Carbon;

Route::get('/', [AnggotaController::class, 'index'])->name('/');
Route::get('/data-pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');
Route::get('/store-pengunjung/{id}', [PengunjungController::class, 'store'])->name('insert_pengunjung.store');

Route::post('/data-pengunjung/exportTgl', [PengunjungController::class, 'export'])->name('exportTgl');
Route::get('/data-pengunjung/exportAll', [PengunjungController::class, 'exportAll'])->name('exportAll');

Route::get('/halaman-admin', function () {
    return view('dashboard');
})->name('/halaman-admin')->middleware('auth');

// Route::get('/buku', function () {
//     return view('buku.index');
// });
Route::get('/buku', [BukuController::class, 'index']);

//peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/add-peminjaman', [PeminjamanController::class, 'create'])->name('create');
Route::post('/insertPeminjaman', [PeminjamanController::class, 'insertPeminjaman'])->name('insertPeminjaman');
Route::get('/edit-peminjaman/{id}', [PeminjamanController::class, 'edit'])->name('editpinjam');
Route::put('/update-peminjaman/{id}', [PeminjamanController::class, 'update'])->name('update.pinjam');
Route::get('/delete/{id}', [PeminjamanController::class, 'delete'])->name('delete.pinjam');

Route::get('/update-perpanjangan/{id}/value', [PeminjamanController::class, 'updatePerpanjangan'])->name('update.perpanjangan');
Route::get('/reset', [PeminjamanController::class, 'reset']);

//detail-peminjaman
Route::get('/detail-peminjaman/{id}', [DetailPeminjamanController::class, 'index'])->name('detail.peminjaman');
Route::post('/insertDetail', [DetailPeminjamanController::class, 'insertDetail'])->name('insertDetail');
Route::get('/cek-pengembalian/{id}', [DetailPeminjamanController::class, 'cek']);
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

