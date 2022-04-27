<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
Use Alert;
use App\Exports\PengunjungExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Input;
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9

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

<<<<<<< HEAD
    public function export(Request $request)
=======
    public function export($value, Request $request)
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
    {
        $request->validate([
            'tgl_start' => 'required',
            'tgl_end' => 'required'
        ]);
<<<<<<< HEAD
        // Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('dd/mm/yy');
        dd(Pengunjung::whereBetween(Carbon::createFromFormat('Y-m-d H:i:s', 'created_at')->format('dd/mm/yyyy'), [$request->tgl_start, $request->tgl_end])->first());
        // return Excel::download(new PengunjungExport($request->tgl_start, $request->tgl_end), 'Rekap Data Pengunjung Perpustakaan Tgl ' .date('d M Y', strtotime(Carbon::now())).  '.xlsx');
=======
        return Excel::download(new PengunjungExport($request->tgl_start, $request->tgl_end), 'Rekap Data Pengunjung Perpustakaan Tgl ' .date('d M Y', strtotime(Carbon::now())).  '.xlsx');
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
    }

    public function exportAll()
    {
        return Excel::download(new PengunjungExport(0,0), 'Rekap Data Pengunjung Perpustakaan Tgl ' .date('d M Y', strtotime(Carbon::now())).  '.xlsx');
    }
}
