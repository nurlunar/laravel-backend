<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'nasabah_id',
        'mitra_id',
        'kategori',
        'berat',
        'harga',
        'total',
        'diterima'
    ];

    public function nasabah_belongs_to()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id', 'id');
    }
}