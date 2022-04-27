<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table ='peminjaman_new';

    // protected $fillable = [
    //     'id_peminjaman',
    //     'id_anggota',
    //     'id_petugas',
    //     'tgl_wajib_kembali',
    // ];

    public function detail(){
        return $this->hasMany(DetailPeminjaman::class, 'id_peminjaman');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
