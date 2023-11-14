<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    public $table = "keranjang";
    use HasFactory;

    protected $fillable = [
        'idCust',
        'idAset',
        'qty',
        'status',
        
    ];

    protected $primaryKey = 'id_keranjang';

    public function aset()
    {
        return $this->belongsTo(Barang::class, 'idAset');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'idCust');
    }
}
