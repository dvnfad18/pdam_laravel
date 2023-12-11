<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    public $table = "beli";

    use HasFactory;

    protected $fillable = [
        
        'jumlah_beli',
        'harga_beli',
        'idAset',
        
    ];
    
    protected $primaryKey = 'id';

    public function aset()
    {
        return $this->belongsTo(aset::class, 'idAset');
    }

}
