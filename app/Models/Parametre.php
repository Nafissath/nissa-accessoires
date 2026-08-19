<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    protected $table = 'parametres';
    protected $fillable = ['cle', 'valeur'];

    public static function get(string $cle, $defaut = null)
    {
        return static::where('cle', $cle)->value('valeur') ?? $defaut;
    }
}