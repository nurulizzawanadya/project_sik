<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
Use Alert;
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        //
=======
        $data = Buku::all();
        view()->share([
            'data' => $data
        ]);
        return view('buku.index');
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        //
=======
        
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        //
=======
        $data = new Buku();
        $data->no_isbn = $request->no_isbn;
        $data->kategori = $request->kategori;
        $data->penerbit = $request->penerbit;
        $data->judul_buku = $request->judul_buku;
        $data->tahun_terbit = $request->tahun_terbit;
        $data->save();
        return redirect()->route('buku')
        ->with('toast_success', 'Data Buku Berhasil ditambahkan!');
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
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
<<<<<<< HEAD
    public function edit(Buku $buku)
    {
        //
=======
    public function edit($id, Buku $buku)
    {
        $data = Buku::find($id);
        view()->share([
            'data' => $data
        ]);
        return view('buku.edit');

>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request, Buku $buku)
    {
        //
=======
    public function update($id, Request $request, Buku $buku)
    {
        $data = Buku::find($id);
        $data->no_isbn = $request->no_isbn;
        $data->kategori = $request->kategori;
        $data->penerbit = $request->penerbit;
        $data->judul_buku = $request->judul_buku;
        $data->tahun_terbit = $request->tahun_terbit;
        $data->save();
        return redirect()->route('buku')
        ->with('toast_success', 'Data Buku Berhasil diupdate!');
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
<<<<<<< HEAD
        //
=======
        $data = Buku::find($id);
        \App\Models\DetailPeminjaman::where('buku_id', $id)->delete();
        \App\Models\DetailPengembalian::where('buku_id', $id)->delete();
        $data->delete();
        return redirect()->route('buku')
        ->with('toast_success', 'Data Buku Berhasil dihapus!');

>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
    }
}
