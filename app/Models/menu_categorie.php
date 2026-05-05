<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_categorie extends Model
{
    protected $table = 'menu_categories';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'sort_order',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function menu()
    {
        return $this->hasMany(menu::class);
    }
}
