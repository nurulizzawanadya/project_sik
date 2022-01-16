<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DetailPeminjamanController;

Route::get('/', function () {
    return view('dashboard');
});

//peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/insertPeminjaman', [PeminjamanController::class, 'insertPeminjaman'])->name('insertPeminjaman');
//detail-peminjaman
Route::get('/detail-peminjaman/{id_peminjaman}', [DetailPeminjamanController::class, 'index']);
Route::post('/insertDetail', [DetailPeminjamanController::class, 'insertDetail'])->name('insertDetail');