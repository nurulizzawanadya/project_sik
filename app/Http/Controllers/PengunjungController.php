<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
Use Alert;

class PengunjungController extends Controller
{
    public function store($anggota_id)
    {
        $data = new Pengunjung();
        $data->anggota_id = $anggota_id;
        $data->save();
        return redirect()->route('/')
        ->with('toast_success', 'Data Pengunjung Berhasil ditambahkan!');
    }
}
