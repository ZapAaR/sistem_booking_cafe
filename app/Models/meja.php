<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class meja extends Model
{
    protected $table = 'mejas';

    protected $fillable = [
        'nomor_meja',
        'kapasitas',
        'status',
        'lokasi',
        'deskripsi',
    ];
}
