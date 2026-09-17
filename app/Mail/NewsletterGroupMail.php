<?php

namespace App\Mail;

use App\Models\NewsletterEnvoi;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterGroupMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public NewsletterEnvoi $envoi,
        public string $tokenDesinscription
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->envoi->sujet,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter-group',
        );
    }
}