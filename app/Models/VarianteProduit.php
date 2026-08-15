<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarianteProduit extends Model
{
    protected $table = 'variantes_produits';

    protected $fillable = [
        'produit_id',
        'sku',
        'matiere_id',
        'couleur_id',
        'taille_id',
        'prix',
        'stock',
        'image',
        'actif',
        'par_defaut',
    ];

    protected $casts = [
        'actif' => 'boolean',
        'par_defaut' => 'boolean',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    public function couleur()
    {
        return $this->belongsTo(Couleur::class, 'couleur_id');
    }

    public function taille()
    {
        return $this->belongsTo(Taille::class, 'taille_id');
    }
}