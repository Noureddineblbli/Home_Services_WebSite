<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServiceProviderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $client;

   
    public function __construct($reservation, $client)
    {
        $this->reservation = $reservation;
        $this->client = $client;
    }

    public function build()
    {
        
        return $this->subject('New Reservation Notification')
                    ->view('emails.service-provider-notification');
    }
}
