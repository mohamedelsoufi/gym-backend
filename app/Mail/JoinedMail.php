<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JoinedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address(settings()->contact_email, env('APP_NAME')),
            subject: __("words.joining_mail_subject"),
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.joined_user',
        );
    }


    public function attachments()
    {
        return [
        ];
    }
}
