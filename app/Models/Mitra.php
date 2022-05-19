<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    //
    protected $table = 'Mitra';

    protected $fillable = [
        'nama_mitra',
        'alamat_mitra',
        'no_telepon',
        'email',
        'username',
        'password',
        'foto'
    ];
}
