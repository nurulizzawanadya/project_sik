<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table='anggota';
    protected $primaryKey = 'id_anggota';

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'id_anggota');
    }

    public function pengembalian(){
        return $this->hasMany(Pengembalian::class, 'id_anggota');
    }
}
