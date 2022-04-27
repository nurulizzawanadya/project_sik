<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(__DIR__ . '/data/penerbit.csv', 'r');
        $isHeader = true;
        $i = 0;
        while(($data = fgetcsv($csvFile, 1000, ',')) !== FALSE) {
            if(!$isHeader) {
            //    for($i=1; $i<=50; $i++){
                 $i++;
                  $buku = Buku::find($i);
                  $buku->penerbit = $data[0];
                  $buku->save();
            //    }       
            
            }
            $isHeader = false;
        }
        fclose($csvFile);
    }
}
