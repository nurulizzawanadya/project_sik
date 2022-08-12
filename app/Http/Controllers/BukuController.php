<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
Use Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::all();
        view()->share([
            'data' => $data
        ]);
        return view('buku.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Buku();
        $data->no_isbn = $request->no_isbn;
        $data->kategori = $request->kategori;
        $data->penerbit = $request->penerbit;
        $data->judul_buku = $request->judul_buku;
        $data->tahun_terbit = $request->tahun_terbit;
        $data->quantity = $request->quantity;
        $data->save();
        return redirect()->route('buku')
        ->with('toast_success', 'Data Buku Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Buku $buku)
    {
        $data = Buku::find($id);
        view()->share([
            'data' => $data
        ]);
        return view('buku.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Buku $buku)
    {
        $data = Buku::find($id);
        $data->no_isbn = $request->no_isbn;
        $data->kategori = $request->kategori;
        $data->penerbit = $request->penerbit;
        $data->judul_buku = $request->judul_buku;
        $data->tahun_terbit = $request->tahun_terbit;
        $data->quantity = $request->quantity;
        $data->save();
        return redirect()->route('buku')
        ->with('toast_success', 'Data Buku Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Buku $buku)
    {
        $data = Buku::find($id);
        \App\Models\DetailPeminjaman::where('buku_id', $id)->delete();
        \App\Models\DetailPengembalian::where('buku_id', $id)->delete();
        $data->delete();
        return redirect()->route('buku')
        ->with('toast_success', 'Data Buku Berhasil dihapus!');

    }
}
