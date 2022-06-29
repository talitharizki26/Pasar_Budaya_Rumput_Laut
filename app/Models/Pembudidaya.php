<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembudidaya extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "pembudidayas";
    protected $fillable = [
        'id_pembudidaya',
        'noktp_pembudidaya',
        'nama_pembudidaya',
        'nohp_pembudidaya',
        'alamat_pembudidaya',
        'tgllahir_pembudidaya',
        'foto_pembudidaya',
        'jenkel_pembudidaya'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $primaryKey = 'noktp_pembudidaya';

    public function produk(){
        return $this->hasOne(produk::class, 'id_rumputlaut');
    }

}
