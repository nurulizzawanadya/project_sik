<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengembalian extends Model
{
    use HasFactory;
    protected $table='detail_pengembalian';
    // protected $primaryKey = 'id_pengembalian';

    // public function book(){
    //     return $this->belongsTo(Buku::class, 'no_isbn', 'judul_buku');
    // }
    public function getParent()
   {
        if ( ! $this->getAttribute('no_isbn')) {
            return null;
        }
        return $this->getAttribute('parent');
   }
   /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function parent()
    {
        return $this->belongsTo(Buku::class, 'no_isbn');
    }
}
