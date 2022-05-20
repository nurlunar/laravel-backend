<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    //
    protected $table = 'nasabah';

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
