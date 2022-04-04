<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;

class DetailPeminjamanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
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

    public function cek($id){
        $data = Peminjaman::with('anggota')->where('id_peminjaman', $id)->first();
        $peminjaman = DetailPeminjaman::where('id_peminjaman', $id)->get();
        $banyak_buku = DetailPeminjaman::with('peminjaman', 'buku')->where('id_peminjaman', $id)->count();
        $deadline = Carbon::parse($data->tgl_wajib_kembali);
        $today = Carbon::now();
        if($today > $deadline) $length = $deadline->diffInDays($today);
        else $length = 0;
        $denda = $length * 1000;

        view()->share([
            'data2' => $data,
            'data' => $peminjaman,
            'denda' => $denda,
            'byk_buku' => $banyak_buku
        ]);

        return view('pengembalian.detail-pengembalian');
    }

    public function update(Request $request){
        $data = DetailPeminjaman::where('id_peminjaman', $request->id)->first();
        $data->no_isbn = $request->no_isbn;
        $data->save();
        session()->flash('berhasil', 'Data Berhasil Diupdate!');
        // return redirect('/detail-peminjaman/'.$post->id_peminjaman);
        return redirect('/peminjaman');
    }
}
