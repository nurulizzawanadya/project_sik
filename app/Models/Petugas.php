<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $fillable = [
        'id_petugas',
        'nama_petugas',
    ];

    public function pengembalian(){
        return $this->hasMany(Pengembalian::class, 'id_petugas');
    }
}
