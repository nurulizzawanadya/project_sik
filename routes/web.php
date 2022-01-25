<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DetailPeminjamanController;
use Carbon\Carbon;

Route::get('/', function () {
    return view('user/dashboard-user');
})->name('/');

Route::get('/halaman-admin', function () {
    return view('dashboard');
})->name('/halaman-admin')->middleware('auth');

//peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/insertPeminjaman', [PeminjamanController::class, 'insertPeminjaman'])->name('insertPeminjaman');
Route::get('/editpinjam/{id}', [PeminjamanController::class, 'edit'])->name('editpinjam');
Route::get('/update-perpanjangan/{id}/value', [PeminjamanController::class, 'updatePerpanjangan'])->name('update.perpanjangan');
Route::get('/reset', [PeminjamanController::class, 'reset']);

//detail-peminjaman
Route::get('/detail-peminjaman/{id_peminjaman}', [DetailPeminjamanController::class, 'index']);
Route::post('/insertDetail', [DetailPeminjamanController::class, 'insertDetail'])->name('insertDetail');
Route::get('/cek-pengembalian/{id_peminjaman}', [DetailPeminjamanController::class, 'cek']);

//pengembalian
Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::post('/pengembalian/{id}', [PengembalianController::class, 'store'])->name('pengembalian');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    echo "cache cleared!";
})->name('clear-cache');

