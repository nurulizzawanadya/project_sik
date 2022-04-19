<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table ='pengembalian_new';
    
    // protected $fillable = [
    //     'id_peminjaman',
    //     'id_petugas',
    //     'id_anggota',
    //     'tgl_kembali',
    //     'denda'
    // ];

    public function petugas(){
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}
