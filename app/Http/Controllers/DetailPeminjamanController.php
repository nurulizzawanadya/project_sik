<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use App\Models\Peminjaman;

class DetailPeminjamanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index($id)
    {
        $data = DetailPeminjaman::with('buku')->where('id_peminjaman', $id)->get();
        $peminjaman = Peminjaman::find($id);
        $buku = Buku::all();
        view()->share([
            'data' => $data,
            'buku' => $buku,
            'peminjaman' => $peminjaman
        ]);

        return view('peminjaman/detail-peminjaman');
    }

    public function insertDetail(Request $request)
    {
        DB::table('detailpeminjaman_new')->insert([
            'id_peminjaman' => $request->id_peminjaman,
            'buku_id' => $request->no_isbn,
        ]);
        
        return redirect()->route('detail.peminjaman', ['id' => $request->id_peminjaman]);
    }

    public function cek($id){
        $data = Peminjaman::find($id);
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
