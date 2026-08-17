<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlePack extends Model
{
    protected $table = 'articles_pack';

    protected $fillable = [
        'pack_id',
        'produit_id',
        'variante_produit_id',
        'quantite',
    ];

    protected $casts = [
        'quantite' => 'integer',
    ];

    public function pack()
    {
        return $this->belongsTo(Pack::class, 'pack_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function variante()
    {
        return $this->belongsTo(VarianteProduit::class, 'variante_produit_id');
    }
}