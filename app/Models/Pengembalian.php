<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table ='pengembalian';
    
    protected $fillable = [
        'id_peminjaman',
        'id_petugas',
        'id_anggota',
        'tgl_kembali',
        'denda'
    ];

    public function petugas(){
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
