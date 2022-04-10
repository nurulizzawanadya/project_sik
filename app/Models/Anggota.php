<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table='anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable=[
        'id_anggota',
        'nama_anggota',
        'alamat_anggota',
        'status_anggota',
        'jenis_anggota'
    ];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'id_anggota');
    }

    public function pengembalian(){
        return $this->hasMany(Pengembalian::class, 'id_anggota');
    }

    public function pengunjung(){
        return $this->hasMany(Pengunjung::class, 'id_anggota');
    }
}
