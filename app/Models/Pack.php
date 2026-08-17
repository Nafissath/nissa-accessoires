<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $table = 'packs';

    protected $fillable = [
        'nom',
        'slug',
        'description',
        'categorie',
        'prix_base',
        'prix_promo',
        'image',
        'actif',
    ];

    protected $casts = [
        'actif' => 'boolean',
        'prix_base' => 'integer',
        'prix_promo' => 'integer',
    ];

    public function articles()
    {
        return $this->hasMany(ArticlePack::class, 'pack_id');
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'articles_pack', 'pack_id', 'produit_id');
    }
}