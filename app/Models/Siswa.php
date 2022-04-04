<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable=[
        'nisn',
        'nama',
        'gender',
        'tmpt_lahir',
        'tgl_lahir',
        'kelas',
        'no_induk'
    ];
}
