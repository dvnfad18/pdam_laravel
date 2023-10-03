<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'nama_adm',
        'noTelp',
    ];
}
