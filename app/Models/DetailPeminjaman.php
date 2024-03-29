<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    protected $table ='detailpeminjaman_new';
    // protected $primaryKey = 'id_peminjaman';

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
