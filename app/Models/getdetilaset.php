<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class getdetilaset extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDetil';
    protected $fillable = [
        'idAset',// Foreign key column
        'nama_aset',
        'jumlah_aset',
        'harga',
        'deskripsi',
        'gambar',
        'idKategori', // Foreign key column
        'isLiked'
    ];
}
