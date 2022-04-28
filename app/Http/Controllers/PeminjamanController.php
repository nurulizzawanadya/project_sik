<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Auth;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\DetailPeminjaman;
use App\Models\DetailPengembalian;
use App\Models\Pengembalian;
use App\Models\Petugas;
use App\Models\Buku;
Use Alert;

class PeminjamanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Peminjaman::with('anggota')->get();
        // dd($data);
        $anggota = Anggota::all();
        $buku = Buku::all();
        view()->share([
            'data' => $data,
            'anggota' => $anggota,
            'buku' => $buku
        ]);

        return view('peminjaman/data-peminjaman');
    }

    public function create()
    {
        $anggota = Anggota::all();
       
        $buku = Buku::all();
        view()->share([
          
            'anggota' => $anggota,
            'buku' => $buku
        ]);

        return view('peminjaman/add');
    }

    public function insertPeminjaman(Request $post)
    {
        $post->validate([
            'id_anggota' => 'required',
            'tgl_wajib_kembali' => 'required'
        ]);

        $data = new Peminjaman();
        $data->anggota_id = $post->id_anggota;
        $data->tgl_wajib_kembali = $post->tgl_wajib_kembali;
        $data->perpanjangan = 0;
        $data->petugas_id = Auth::user()->id;
        $data->save();
        if(!empty($post->id_isbn1)){
            $detailpeminjaman = new DetailPeminjaman();
            $detailpeminjaman->id_peminjaman = $data->id;
            $detailpeminjaman->buku_id = $post->id_isbn1;
            $detailpeminjaman->save();
        }
        if(!empty($post->id_isbn2)){
            $detailpeminjaman = new DetailPeminjaman();
            $detailpeminjaman->id_peminjaman = $data->id;
            $detailpeminjaman->buku_id = $post->id_isbn2;
            $detailpeminjaman->save();

        }
        if(!empty($post->id_isbn3)){
            $detailpeminjaman = new DetailPeminjaman();
            $detailpeminjaman->id_peminjaman = $data->id;
            $detailpeminjaman->buku_id = $post->id_isbn3;
            $detailpeminjaman->save();
        }
        
        return redirect()->route('detail.peminjaman', ['id' => $data->id])
        ->with('toast_success', 'Data Peminjaman Berhasil ditambahkan');
    }

    public function edit($id){
        $data = Peminjaman::findOrFail($id);
        $detail = DetailPeminjaman::where('id_peminjaman', $id);
        $anggota = Anggota::all();
        view()->share([
            'data' => $data,
            'detail' => $detail,
            'anggota' => $anggota
        ]);

        return view('peminjaman.edit');
    }

    public function update($id, Request $request){
        $data = Peminjaman::findOrFail($id);
        $data->anggota_id = $request->id_anggota;
        $data->tgl_wajib_kembali = $request->tgl_wajib_kembali;
        $data->save();
        session()->flash('berhasil', 'Data Berhasil Diupdate!');
        // return redirect('/detail-peminjaman/'.$post->id_peminjaman);
        return redirect('/peminjaman');
    }

    public function delete($id){
       
        $data = Peminjaman::findOrFail($id);
        DetailPeminjaman::where('id_peminjaman', $data->id_peminjaman)->delete();
        Peminjaman::find($id)->delete();
        session()->flash('berhasil', 'Data Berhasil Dihapus!');
        // return redirect('/detail-peminjaman/'.$post->id_peminjaman);
        return redirect('/peminjaman');
    }

    public function updatePerpanjangan($id, Request $value){
        $data = Peminjaman::find($id);
        $data->perpanjangan = $value->value;
        $tgl = "$data->tgl_wajib_kembali";
        if($value->value == 1)
            $data->tgl_wajib_kembali = date('Y-m-d', strtotime($tgl. ' + 3 days'));
        
        $data->save();
        session()->flash('berhasil', 'Perpanjangan Berhasil Diupdate');
        return redirect('/peminjaman');
    }

    public function reset()
    {
        Peminjaman::truncate();
        DetailPeminjaman::truncate();
        Pengembalian::truncate();
        DetailPengembalian::truncate();
        echo "sukses reset";

    }
        
        
}
