<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_body;

    public function __construct($mail_body)
    {
        $this->mail_body = $mail_body;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address($this->mail_body->email, $this->mail_body->name),
            subject: 'ail From Queue',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.news_letter',
        );
    }

}
