<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembudidaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembudidaya',
        'alamat_pembudidaya',
        'nohp_pembudidaya',
        'tgllahir_pembudidaya',
        'id_users',
    ];
}
