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
    public function store($id_peminjaman, Request $post){
       
        // $hzz = ;
        // dd($hzz);
        $petugas = Petugas::where('user_id', Auth::user()->id)->first();
        
        // dd("$pengembalian . '' . $hzz->id");
        // dd($hzz->id);
        $data = Pengembalian::create([
            'id_peminjaman' => $id_peminjaman,
            'id_petugas' => $petugas->id_petugas,
            'tgl_kembali' => Carbon::now(),
            'denda' => $post->denda,
        ]);
        $pengembalian = Pengembalian::findorFail($data->id);
        $pengembalian->id_pengembalian = 'kembali'. $data->id;
        $pengembalian->save();
        Peminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        // DetailPeminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        if($post->no_isbn != 0){
            if(!empty($post->id_isbn1)){
                DB::table('detail_pengembalian')->insert([
                    'id_pengembalian' => $data->id_pengembalian,
                    'no_isbn' => $post->id_isbn1,
                ]);
            }
            if(!empty($post->id_isbn2)){
                DB::table('detail_pengembalian')->insert([
                    'id_pengembalian' => $pengembalian . '' . $data->id,
                    'no_isbn' => $post->id_isbn2,
                ]);
            }
            if(!empty($post->id_isbn3)){
                DB::table('detail_pengembalian')->insert([
                    'id_pengembalian' => $pengembalian . '' . $data->id,
                    'no_isbn' => $post->id_isbn3,
                ]);
            }
            
        }
        
        // if($data->id >= 1 && $data->id <= 10) $pengembalian = 'pgmbn000';
        // elseif($data->id >= 10 && $data->id <= 100) $pengembalian = 'pmn00';
        // elseif($data->id >= 100 && $data->id <= 1000) $pengembalian = 'pjmn0';
        // elseif($data->id >= 1000 && $data->id <= 10000) $pengembalian = 'pjmn';
        // // dd($pengembalian . '' . $data->id);

        
        session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        // return redirect('/detail-pengembalian/'.$post->id_pengembalian);
        return redirect('/peminjaman');
    }
}
