<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'idTrans';
    protected $fillable = [
        'idCust',
        'idAset',
        'waktu_awal',
        'waktu_akhir',
        'jaminan',
        'dp',
        'total_bayar',
        'bukti_jaminan',
        'bukti_bayar',
        'status',
         ];
}
