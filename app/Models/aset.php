<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aset extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAset';
    protected $fillable = [
        'nama_aset',
        'alamat_aset',
        'tipe',
        'harga',
        'gambar',
        'kategori'
    ];}
