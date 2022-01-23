<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DetailPeminjamanController;
use Carbon\Carbon;

Route::get('/', function () {
    return view('dashboard');
})->name('/');

// Route::get('/cek/{id}', function () {
//     return dd(Carbon::now())
// });
Route::get('/cek-pengembalian/{id_peminjaman}', [DetailPeminjamanController::class, 'cek']);
//pengembalian
Route::post('/pengembalian/{id}', [PengembalianController::class, 'store'])->name('pengembalian');

Route::get('/scan', function () {
    return view('scan_barcode');
});

//peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/insertPeminjaman', [PeminjamanController::class, 'insertPeminjaman'])->name('insertPeminjaman');
Route::get('/edit-peminjaman/{id}', [PeminjamanController::class, 'edit'])->name('editpinjam');
//detail-peminjaman
Route::get('/detail-peminjaman/{id_peminjaman}', [DetailPeminjamanController::class, 'index']);
Route::post('/insertDetail', [DetailPeminjamanController::class, 'insertDetail'])->name('insertDetail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
