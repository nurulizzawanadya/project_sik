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

Route::put('/update-perpanjangan/{id}', [PeminjamanController::class, 'updatePerpanjangan'])->name('update.perpanjangan');
Route::get('/reset', [PeminjamanController::class, 'reset']);
//detail-peminjaman
Route::get('/detail-peminjaman/{id_peminjaman}', [DetailPeminjamanController::class, 'index']);
Route::post('/insertDetail', [DetailPeminjamanController::class, 'insertDetail'])->name('insertDetail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return redirect()->route('home')->with('toast_success', 'Cache Berhasil dihapus!');
})->name('clear-cache');

