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
        $data = new Pengembalian();
        $data->peminjaman_id = $id_peminjaman;
        $data->petugas_id = Auth::user()->id;
        $data->anggota_id = $post->id_anggota;
        $data->tgl_kembali = Carbon::now();
        $data->denda = $post->denda;
        $data->save();
        // $pengembalian->id_pengembalian = 'kembali'. $data->id;
        // $pengembalian->save();
        $banyak_buku = DetailPeminjaman::with('peminjaman', 'buku')->where('id_peminjaman', $id_peminjaman)->count();
        Peminjaman::find($id_peminjaman)->delete();
        DetailPeminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        if($post->id_isbn != 0){
            if(!empty($post->id_isbn1)){
                DB::table('detailpengembalian_new')->insert([
                    'pengembalian_id' => 'kembali'. $data->id,
                    'buku_id' => $post->id_isbn1,
                ]);
            }
            if(!empty($post->id_isbn2)){
                DB::table('detailpengembalian_new')->insert([
                    'pengembalian_id' => 'kembali'. $data->id,
                    'buku_id' => $post->id_isbn2,
                ]);
            }
            if(!empty($post->id_isbn3)){
                DB::table('detailpengembalian_new')->insert([
                    'pengembalian_id' => 'kembali'. $data->id,
                    'buku_id' => $post->id_isbn3,
                ]);
            }
            if(!empty($post->id_isbn4)){
                DB::table('detailpengembalian_new')->insert([
                    'pengembalian_id' => 'kembali'. $data->id,
                    'buku_id' => $post->id_isbn4,
                ]);
            }
            if(!empty($post->id_isbn5)){
                DB::table('detailpengembalian_new')->insert([
                    'pengembalian_id' => 'kembali'. $data->id,
                    'buku_id' => $post->id_isbn5,
                ]);
            }
            
        }

        session()->flash('berhasil', 'Buku Dikembalikan');
        // return redirect('/detail-pengembalian/'.$post->id_pengembalian);
        return redirect('/peminjaman');
    }
}
