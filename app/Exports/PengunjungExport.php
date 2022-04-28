<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PengunjungExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents, WithTitle, WithStyles
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
            return Pengunjung::whereBetween('tgl_berkunjung', [$this->tgl_start, $this->tgl_end])->get();
            // return Pengunjung::where('created_at', new DateTime($this->tgl_start))->where('created_at', new DateTime($this->tgl_end))->first();
    }
    public function map($a) : array {
        return [
            $a->id,
            $a->anggota_id,
            $a->anggota->nama_anggota,
            date('d M Y', strtotime($a->created_at)),
        ] ;
    }

    public function headings() : array {
        return [
           '#',
           'ID Anggota',
           'Nama Anggota',
           'Tanggal Berkunjung',
        ] ;
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setTitle('Patrick');
            },
        ];
    }


    public function title(): string
    {
    	return 'Rekap Data Pengunjung';
        // 'Rekap '.$nama.'.xlsx'
    }

    public function styles(Worksheet $sheet)
    {

        $sheet->getStyle(1)->getFont()->setBold(true);

    }


}
