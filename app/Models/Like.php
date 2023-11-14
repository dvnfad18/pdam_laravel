<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $table = "Likes";
    use HasFactory;

    protected $fillable = [
        'idCust',
        'idAset',
    ];
}
