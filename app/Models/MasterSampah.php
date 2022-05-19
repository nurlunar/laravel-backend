<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterSampah extends Model
{
    //
    protected $table = 'master_sampah';

    protected $fillable = [
        'kategori',
        'harga',
        'foto'
    ];
}
