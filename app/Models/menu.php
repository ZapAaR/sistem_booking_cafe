<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'tersedia',
    ];

    public function kategori()
    {
        return $this->belongsTo(menu_categorie::class);
    }
}
