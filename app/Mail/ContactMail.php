<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;

    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject("Новая заявка с сайта Inertlab от {$this->name}")
                    ->view('emails.contact')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'messageText' => $this->message,
                    ]);
    }
}

