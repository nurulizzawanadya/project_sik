<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
Use Alert;
use App\Exports\PengunjungExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class PengunjungController extends Controller
{
    public function store($anggota_id)
    {
        $data = new Pengunjung();
        $data->anggota_id = $anggota_id;
        $data->tgl_berkunjung = Carbon::now();
        $data->save();
        return redirect()->route('/')
        ->with('toast_success', 'Data Pengunjung Berhasil ditambahkan!');
    }

    public function index()
    {
        $data = Pengunjung::all();
        view()->share([
            'data' => $data
        ]);

        return view('user.pengunjung');
    }

    public function export($value, Request $request)
    {
        $request->validate([
            'tgl_start' => 'required',
            'tgl_end' => 'required'
        ]);
        return Excel::download(new PengunjungExport($request->tgl_start, $request->tgl_end), 'Rekap Data Pengunjung Perpustakaan Tgl ' .date('d M Y', strtotime(Carbon::now())).  '.xlsx');
    }

    public function exportAll()
    {
        return Excel::download(new PengunjungExport(0,0), 'Rekap Data Pengunjung Perpustakaan Tgl ' .date('d M Y', strtotime(Carbon::now())).  '.xlsx');
    }
}
