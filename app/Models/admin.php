<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAdmin';
    protected $fillable = [
        'username',
        'password',
        'nama_adm',
        'noTelp',
    ];
}
