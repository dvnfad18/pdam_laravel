<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCust';
    protected $fillable = [
        'namaCust',
        'no_telp',
        'email_Cust',
        'password_Cust',
        'alamat' ];
}
