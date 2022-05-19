<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    //
    protected $table = 'Pesanan';

    protected $fillable = [
        'nasabah_id',
        'mitra_id',
        'kategori',
        'berat',
        'harga',
        'total',
        'diterima'
        
    ];
}
