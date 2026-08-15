<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProduit extends Model
{
    // 👇 On précise le vrai nom de la table
    protected $table = 'images_produits';

    protected $fillable = [
        'produit_id',
        'chemin',
        'est_principale',
    ];

    protected $casts = [
        'est_principale' => 'boolean',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}