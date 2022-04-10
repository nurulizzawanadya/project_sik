<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::all();
        view()->share([
            'data' => $data
        ]);

        return view('insert_pengunjung');
    }
}
