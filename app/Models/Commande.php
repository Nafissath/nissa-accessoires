<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $fillable = [
        'numero_commande', 'cliente_id', 'sous_total', 'frais_livraison', 'total',
        'statut', 'methode_paiement', 'statut_paiement',
        'adresse', 'instructions', 'telephone', 'whatsapp', 'date_commande', 'stock_decremente',
    ];

    protected $casts = [
        'date_commande' => 'datetime',
        'stock_decremente' => 'boolean'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function articles()
    {
        return $this->hasMany(ArticleCommande::class);
    }
}