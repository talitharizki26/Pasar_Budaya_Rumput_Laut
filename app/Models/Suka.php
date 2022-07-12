<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suka extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_suka';
    protected $fillable = [
        'noktp_pelanggan',
        'id_artikel',
    ];

    public $timestamps = false;
}
