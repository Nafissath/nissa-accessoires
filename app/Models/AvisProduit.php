<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisProduit extends Model
{
    protected $table = 'avis_produits';

    protected $fillable = [
        'produit_id',
        'nom',
        'email',
        'note',
        'commentaire',
        'est_approuve',
    ];

    protected $casts = [
        'est_approuve' => 'boolean',
        'note' => 'integer',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}