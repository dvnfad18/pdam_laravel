<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aset extends Model
{
    public $table = "asets";
    use HasFactory;
    
    protected $fillable = [
        'nama_aset',
        'alamat_aset',
        'tipe',
        'harga',
        'gambar',
        'kategori',
        'deskripsi',
    ];

    protected $primaryKey = 'idAset';

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'idKategori');
    }
}