<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class customer extends Authenticatable 
{
    use HasFactory, HasApiTokens;
    protected $primaryKey = 'idCust';
    protected $password = 'password_Cust';
    protected $fillable = [
        'namaCust',
        'no_telp',
        'email_Cust',
        'password_Cust',
        'alamat',
        'gambar',
    ];
   
    protected $hidden = [
        'password_Cust',
        'remember_token',
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
