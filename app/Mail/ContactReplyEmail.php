<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $messageContent;
    public $name;

    public function __construct($subject, $message,$name)
    {
        $this->subject = $subject;
        $this->messageContent = $message;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.contact-reply')
                    ->with([
                        'message' => $this->messageContent,
                        'name' => $this->name,
                    ]);
    }
}

