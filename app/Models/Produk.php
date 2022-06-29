<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produks";
    protected $primaryKey = 'id_rumputlaut';

    public $timestamps = false;

    public function pembudidaya(){
        return $this->belongsTo(pembudidaya::class,'noktp_pembudidaya');
    }
}
