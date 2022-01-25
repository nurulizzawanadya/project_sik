<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    protected $table ='detail_peminjaman';
    protected $primaryKey = 'id_peminjaman';

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'no_isbn');
    }
}
