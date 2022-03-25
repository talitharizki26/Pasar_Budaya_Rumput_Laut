<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'alamat_pelanggan',
        'nohp_pelanggan',
        'jk_pelanggan',
        'foto_pelanggan',
        'id_users',
    ];
}
