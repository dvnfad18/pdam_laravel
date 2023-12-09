<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class customer extends Model
{
    use HasFactory, HasApiTokens;
    protected $primaryKey = 'idCust';
    protected $fillable = [
        'namaCust',
        'no_telp',
        'email_Cust',
        'password_Cust',
        'alamat',
        'gambar',
    ];

    // protected $primaryKey = 'idCust';

    public function setPasswordAttribute($value)
    {
    $this->attributes['password_Cust'] = bcrypt($value);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'idCust');
    }

}
