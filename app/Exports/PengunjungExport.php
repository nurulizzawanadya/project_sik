<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromCollection;

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
            return Pengunjung::whereBetween('created_at', [$this->tgl_start, $this->tgl_end])->get();
            // return Pengunjung::where('created_at', new DateTime($this->tgl_start))->where('created_at', new DateTime($this->tgl_end))->first();
    }
    public function map($export) : array {
        return [
            $export->id,
            $export->acara->nama,
            $export->nama->name,
            $export->nama->divisi,
            $export->nama->kelas,
            asset($export->bukti),
            Carbon::parse($export->updated_at)->toFormattedDateString(),
            Carbon::parse($export->created_at)->toFormattedDateString()
        ] ;
            $nama = $export->acara->nama;
    }

    public function headings() : array {
        return [
           '#',
           'Nama Acara',
           'Nama Anggota',
           'Divisi (1 = Kesma, 2 = Pendidikan, 3 = Medinfo, 4 = Lingkungan Hidup, 5 = Kewirausahaan, 6 = Pengurus Harian)',
           'Kelas',
           'Bukti',
           'Updated At',
           'Created At'
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
    	return 'Rekap Presensi';
        // 'Rekap '.$nama.'.xlsx'
    }

    public function styles(Worksheet $sheet)
    {

        $sheet->getStyle(1)->getFont()->setBold(true);

    }


}
