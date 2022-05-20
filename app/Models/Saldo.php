<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    //
    protected $table = 'saldo';

    protected $fillable = [
        'nasabah_id',
        'mitra_id',
        'pemasukan',
        'pengeluaran',
        'keterangan'
        
    ];
}
