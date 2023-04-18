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
            from: new Address(env("MAIL_FROM_ADDRESS"), env('MAIL_FROM_NAME')),
            subject: 'Mail From Queue',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.news_letter',
        );
    }

}
