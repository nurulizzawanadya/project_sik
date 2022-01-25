<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $primaryKey ='id_petugas';

    protected $fillable = [
        'id_petugas',
        'nama_petugas',
    ];

    public function post(){
        return $this->hasMany(Pengembalian::class, 'id');
    }
}
