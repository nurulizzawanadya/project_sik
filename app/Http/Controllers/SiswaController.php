<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $data = Siswa::all();
        view()->share([
            'data' => $data
        ]);
        return view('user.pengunjung');
    }
}
