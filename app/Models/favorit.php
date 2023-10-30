<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorit extends Model
{
    use HasFactory;
    protected $primaryKey = 'idFavorit';
    protected $fillable = [
        'idAset', // Foreign key column
        'nama_aset',
        'jumlah_aset',
        'harga',
        'deskripsi',
        'gambar',
        'idKategori',
        // Foreign key column
        'isLiked'
        
    ];
}
