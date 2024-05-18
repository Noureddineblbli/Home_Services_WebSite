<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $clientName;
    public $serviceProviderName;
    public $serviceProviderEmail;
    public $serviceProviderPhone;
    public $serviceAddress;
    public $serviceDate;
    public $serviceTime;
    public $serviceName;
    public $reservationCreatedDate;
    public $reservationCreatedTime;
    


   

   
    public function __construct($client_name, $provider_name, $provider_email, $phone,$adresse_maison,$date,$time,$reservation_created_date, $reservation_created_time,$serviceName)
    {
        $this->clientName = $client_name;
        $this->serviceProviderName = $provider_name;
        $this->serviceProviderEmail = $provider_email;
        $this->serviceProviderPhone = $phone;
        $this->serviceAddress = $adresse_maison;
        $this->serviceDate = $date;
        $this->serviceTime = $time;
        $this->serviceName = $serviceName;
        $this->reservationCreatedDate = $reservation_created_date;
        $this->reservationCreatedTime = $reservation_created_time;


    }

    public function build()
    {
        
        return $this->subject('Reservation Accepted')
                    ->view('emails.client-notification');
    }
}
