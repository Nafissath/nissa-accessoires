<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    protected $fillable = ['nom', 'slug', 'actif'];
    protected $casts = ['actif' => 'boolean'];
}