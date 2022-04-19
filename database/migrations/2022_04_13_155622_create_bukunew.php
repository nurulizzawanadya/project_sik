<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukunew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukunew', function (Blueprint $table) {
            $table->id();
            $table->string('no_isbn', 50);
            $table->string('kategori');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('judul_buku');
            $table->string('tahun_terbit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukunew');
    }
}
