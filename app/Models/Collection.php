<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['nom', 'slug', 'description', 'image', 'actif'];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}