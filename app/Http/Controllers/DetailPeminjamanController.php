<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPeminjamanController extends Controller
{
    public function index($id)
    {
        $peminjaman = DB::table('peminjaman')->where('id_peminjaman', $id)->get();
        $detailpeminjaman = DB::table('detail_peminjaman')->where('id_peminjaman', $id)
        ->join ('buku', 'detail_peminjaman.no_isbn', '=', 'buku.no_isbn')
        ->get();

        $id = DB::table('buku')->get();

        $data = array(
            'menu' => 'Peminjaman',
            'peminjaman' => $peminjaman,
            'detailpeminjaman' => $detailpeminjaman,
            'id' => $id,
            'submenu' => '',
        );

        return view('peminjaman/detail-peminjaman', $data);
    }

    public function insertDetail(Request $request)
    {
        DB::table('detail_peminjaman')->insert([
            'id_peminjaman' => $request->id_peminjaman,
            'no_isbn' => $request->no_isbn,
        ]);
        
        return redirect('/detail-peminjaman/'.$request->id_peminjaman);
    }
}
