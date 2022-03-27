<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_pesanan',
        'waktu_pesanan',
        'total_pesanan',
        'status_pesanan',
        'ekspedisi_pesanan',
        'konfirmasi_pesanan',
        'bukti_pembayaran',
        'isi_testimoni',
        'tgl_testimoni',
        'balasan_testimoni',
        'bintang_testimoni',
        'id_rumputlaut',
    ];

    public $timestamps = false;
}
