<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceProviderVerifiedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function build()
    {
        return $this->subject('Your Account has been verified')
                    
                    ->view('emails.service-provider-verified',['provider'=>$this->provider]);
    }
}
