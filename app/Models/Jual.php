<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    use HasFactory;

    protected $table = 'jual';
    protected $primaryKey = 'id_jual';
    protected $fillable = [
        'total',
        'total_final',
        'alamat',
        'nohp',
        'bukti_bayar',
        'status',
        'nama_lengkap',
        'tanggal',
        'jamAwal',
        'jamAkhir',
        'idCust',
    ];

    public function detilJual()
    {
        return $this->hasMany(DetileJual::class, 'id_jual');
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_keranjang');
    }

    public function aset()
    {
        return $this->belongsToMany(aset::class, 'detil_jual', 'id_jual', 'idAset');
}
    public function customer()
    {
        return $this->belongsTo(customer::class, 'idCust');
    }
}