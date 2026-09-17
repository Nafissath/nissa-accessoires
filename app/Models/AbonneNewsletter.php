<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbonneNewsletter extends Model
{
    protected $table = 'newsletter_abonnes';

    protected $fillable = ['email', 'token', 'actif', 'source'];

    protected $casts = [
        'actif' => 'boolean',
    ];
}