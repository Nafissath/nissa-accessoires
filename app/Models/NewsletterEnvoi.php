<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterEnvoi extends Model
{
    protected $table = 'newsletter_envois';

    protected $fillable = [
        'sujet',
        'contenu',
        'nombre_destinataires',
        'envoyes_reussis',
        'envoyes_echoues',
        'envoye_at',
    ];

    protected $casts = [
        'envoye_at' => 'datetime',
    ];
}