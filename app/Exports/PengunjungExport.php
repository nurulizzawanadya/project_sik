<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengunjungExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $tgl_start;
    protected $tgl_end;

    public function __construct($tgl_start, $tgl_end)
    {
        $this->tgl_start = $tgl_start;
        $this->tgl_end = $tgl_end;
    }
    public function collection()
    {
        if($this->tgl_start == 0 || $this->tgl_end == 0)
            return Pengunjung::all();
        else
            return Pengunjung::whereBetween('created_at', [$this->tgl_start, $this->tgl_end])->get();
            // return Pengunjung::where('created_at', new DateTime($this->tgl_start))->where('created_at', new DateTime($this->tgl_end))->first();
    }


}
