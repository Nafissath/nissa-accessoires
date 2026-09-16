<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCommande extends Model
{
    protected $table = 'articles_commande';

    protected $fillable = [
        'commande_id', 'produit_id', 'variante_produit_id', 'pack_id',
        'quantite', 'prix_unitaire', 'prix_total',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function variante()
    {
        return $this->belongsTo(VarianteProduit::class, 'variante_produit_id');
    }

    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
}