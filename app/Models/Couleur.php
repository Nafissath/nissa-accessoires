<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    protected $fillable = [
        'nom',
        'slug',
        'code_hexadecimal',
        'actif',
    ];

    protected $casts = [
        'actif' => 'boolean',
    ];

    public function variantes()
    {
        return $this->hasMany(VarianteProduit::class);
    }
}