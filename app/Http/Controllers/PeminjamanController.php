<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = DB::table('peminjaman')
        ->join ('anggota', 'peminjaman.id_anggota', '=', 'anggota.id_anggota')
        ->join ('petugas', 'peminjaman.id_petugas', '=', 'petugas.id_petugas')
        ->get();

        $id = DB::table('anggota')->get();
        $id_2 = DB::table('petugas')->get();

        $data = array(
            'menu' => 'Peminjaman',
            'peminjaman' => $peminjaman,
            'id' => $id,
            'id_2' => $id_2,
            'submenu' => '',
        );

        return view('peminjaman/data-peminjaman', $data);
    }

    public function insertPeminjaman(Request $post)
    {
        DB::table('peminjaman')->insert([
            'id_peminjaman' => $post->id_peminjaman,
            'id_anggota' => $post->id_anggota,
            'id_petugas' => $post->id_petugas,
            'created_at' => $post->created_at,
            'tgl_wajib_kembali' => $post->tgl_wajib_kembali,
        ]);

        session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        // return redirect('/detail-peminjaman/'.$post->id_peminjaman);
        return redirect('/peminjaman/'.$post->id_peminjaman);
    }
}
