<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table='buku';
    protected $primaryKey = 'no_isbn';

    public function pinjam(){
        return $this->hasMany(DetailPeminjaman::class, 'no_isbn');
    }

    public function balik(){
        return $this->hasMany(DetailPengembalian::class, 'no_isbn', 'judul_buku');
    }
}
