<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(__DIR__ . '/data/siswa.csv', 'r');
        $isHeader = true;
        while(($data = fgetcsv($csvFile, 1000, ',')) !== FALSE) {
            if(!$isHeader) {
                Siswa::create([
                    'nisn' => $data[1],
                    'no_induk' => $data[0],
                    'nama' => $data[2],
                    'gender' => $data[3],
                    'tmpt_lahir' => $data[4],
                    'tgl_lahir' => Carbon::createFromFormat('d/m/Y', $data[5]),
                    'kelas' => $data[6]
                ]);
            }
            $isHeader = false;
        }
        fclose($csvFile);
    }
}
