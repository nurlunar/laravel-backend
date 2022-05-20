<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    // models untuk menampilkan reward nasabah
    protected $table = 'reward';

    protected $fillable = [
        'nasabah_id',
        'jumlah_point' 
        
    ];
}
