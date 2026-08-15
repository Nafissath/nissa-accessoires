<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $fillable = [
        'nom',
        'slug',
        'description_courte',
        'description_longue',
        'prix_base',
        'prix_promo',
        'prix_coutant',
        'categorie_id',
        'collection_id',
        'est_pack',
        'est_actif',
        'est_en_avant',
        'gestion_stock_activee',
        'poids',
        'titre_seo',
        'description_seo',
    ];

    protected $casts = [
        'est_pack' => 'boolean',
        'est_actif' => 'boolean',
        'est_en_avant' => 'boolean',
        'gestion_stock_activee' => 'boolean',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    public function images()
    {
        return $this->hasMany(ImageProduit::class, 'produit_id');
    }

    public function variantes()
    {
        return $this->hasMany(VarianteProduit::class, 'produit_id');
    }

    public function cibles()
    {
        return $this->belongsToMany(Cible::class, 'cible_produit', 'produit_id', 'cible_id');
    }
}