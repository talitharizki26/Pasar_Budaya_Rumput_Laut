<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tidaksuka extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tidaksuka';
    protected $fillable = [
        'noktp_pelanggan',
        'id_artikel',
    ];

    public $timestamps = false;
}
