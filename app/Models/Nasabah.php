<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    //
    protected $table = 'Nasabah';

    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'no_telepon',
        'username',
        'password',
        'foto'
    ];
}
