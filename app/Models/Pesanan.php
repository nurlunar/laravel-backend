<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pesanan extends Model
{
    //
    protected $table = 'pesanan';

    public function Nasabah()
{
    return $this-> belongTo(
        'App/Nasabah' 
    );
}

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
// public function nama()
// {
//     return $this-> hasone(
//         'App/Nama' 
//     );
// }