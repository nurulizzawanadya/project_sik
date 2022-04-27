<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table='bukunew';
    // protected $primaryKey = 'no_isbn';
<<<<<<< HEAD
    protected $fillable=[
        'penerbit',
    ];
=======
    // protected $fillable=[
    //     'penerbit',
    // ];
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9

    public function pinjam(){
        return $this->hasMany(DetailPeminjaman::class, 'id');
    }

    public function balik(){
        return $this->hasMany(DetailPengembalian::class, 'id');
    }
}
