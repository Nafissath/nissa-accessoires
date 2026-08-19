<?php

namespace App\Mail;

use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NouvelleCommandeAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $commande;

    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' NOUVELLE COMMANDE ' . $this->commande->numero_commande . ' - ' . number_format($this->commande->total, 0, ',', ' ') . ' FCFA',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.nouvelle-commande-admin',
        );
    }
}