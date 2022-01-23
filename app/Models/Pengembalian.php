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
        'tgl_kembali',
        'denda'
    ];
}
