<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'prenom', 'nom', 'telephone', 'whatsapp', 'email', 'adresse',
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}