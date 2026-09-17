<?php

namespace App\Mail;

use App\Models\AbonneNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BienvenueNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public AbonneNewsletter $abonne)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenue chez Nissa Accessoires',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.bienvenue-newsletter',
        );
    }
}