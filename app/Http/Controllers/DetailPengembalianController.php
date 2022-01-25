<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Auth;
use App\Models\Pengembalian;
use App\Models\Detailpengembalian;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Petugas;
use App\Models\Buku;

class DetailPengembalianController extends Controller
{
    public function index()
    {
        $detail = DetailPengembalian::all();
        $pengembalian = Pengembalian::all();
        $buku = Buku::all();

        return view('pengembalian.data-detail-pengembalian', compact('detail', 'pengembalian','buku'));
    }
}
