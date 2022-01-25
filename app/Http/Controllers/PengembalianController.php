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
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Pengembalian::with('anggota', 'petugas')->get();
        // dd($data);
        view()->share([
            'data' => $data
        ]);
       
        return view('pengembalian.data-pengembalian');
    }
    
    public function store($id_peminjaman, Request $post)
    {
        $petugas = Petugas::where('user_id', Auth::user()->id)->first();
        $data = Pengembalian::create([
            'id_peminjaman' => $id_peminjaman,
            'id_petugas' => $petugas->id_petugas,
            'id_anggota' => $post->id_anggota,
            'tgl_kembali' => Carbon::now(),
            'denda' => $post->denda,
        ]);
        $pengembalian = Pengembalian::findOrFail($data->id);
        $pengembalian->id_pengembalian = 'kembali'. $data->id;
        $pengembalian->save();
        Peminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        DetailPeminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        if($post->id_isbn != 0){
            if(!empty($post->id_isbn1)){
                DB::table('detail_pengembalian')->insert([
                    'id_pengembalian' => 'kembali'. $data->id,
                    'no_isbn' => $post->id_isbn1,
                ]);
            }
            if(!empty($post->id_isbn2)){
                DB::table('detail_pengembalian')->insert([
                    'id_pengembalian' => 'kembali'. $data->id,
                    'no_isbn' => $post->id_isbn2,
                ]);
            }
            if(!empty($post->id_isbn3)){
                DB::table('detail_pengembalian')->insert([
                    'id_pengembalian' => 'kembali'. $data->id,
                    'no_isbn' => $post->id_isbn3,
                ]);
            }
            
        }

        session()->flash('berhasil', 'Buku Dikembalikan');
        // return redirect('/detail-pengembalian/'.$post->id_pengembalian);
        return redirect('/peminjaman');
    }
}
