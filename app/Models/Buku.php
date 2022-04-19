<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table='bukunew';
    // protected $primaryKey = 'no_isbn';
    // protected $fillable=[
    //     'penerbit',
    // ];

    public function pinjam(){
        return $this->hasMany(DetailPeminjaman::class, 'id');
    }

    public function balik(){
        return $this->hasMany(DetailPengembalian::class, 'id');
    }
}
