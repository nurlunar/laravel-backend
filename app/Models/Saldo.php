<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    //
    protected $table = 'Saldo';

    protected $fillable = [
        'nasabah_id',
        'mitra_id',
        'pemasukan',
        'pengeluaran',
        'keterangan'
        
    ];
}
