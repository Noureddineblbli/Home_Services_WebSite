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
    public $serviceProvider;

   
    public function __construct($reservation, $client,$serviceProvider)
    {
        $this->reservation = $reservation;
        $this->client = $client;
        $this->serviceProvider = $serviceProvider;
    }

    public function build()
    {
        
        return $this->subject('New Reservation Notification')
                    ->view('emails.service-provider-notification');
    }
}
