<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;

class VerifyReservationComponent extends Component
{

    public $reservationId;

    public function verify()
    {

      return response('he');
    }

   
    public function render()
    {
        return view('livewire.sprovider.verify-reservation-component');
    }
}
