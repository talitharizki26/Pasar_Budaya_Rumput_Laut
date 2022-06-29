<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pelanggan extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'alamat_pelanggan',
        'noktp_pelanggan',
        'nohp_pelanggan',
        'tgllahir_pelanggan',
        'foto_pelanggan',
        'jenkel_pelanggan'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $primaryKey = 'noktp_pelanggan';


}
