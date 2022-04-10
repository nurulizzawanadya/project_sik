<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;
use Carbon\Carbon;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(__DIR__ . '/data/anggota.csv', 'r');
        $isHeader = true;
        while(($data = fgetcsv($csvFile, 1000, ',')) !== FALSE) {
            if(!$isHeader) {
                Anggota::create([
                    'id_anggota' => $data[0],
                    'nama_anggota' => $data[1],
                    'alamat_anggota' => $data[2],
                    'status_anggota' => $data[3],
                    'jenis_anggota' => $data[4],
                   
                ]);
            }
            $isHeader = false;
        }
        fclose($csvFile);
    }
}
