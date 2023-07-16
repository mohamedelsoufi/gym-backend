<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
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
            from: new Address(CONTACTS_MAIL, env('APP_NAME')),
            subject: $this->contact['subject'],
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.reply_contact_mail',
        );
    }


    public function attachments()
    {
        return [
        ];
    }
}
