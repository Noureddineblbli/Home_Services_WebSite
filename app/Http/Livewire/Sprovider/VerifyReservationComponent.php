<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;

class VerifyReservationComponent extends Component
{

    public $reservationId;

    public function verify()
    {
        // Perform verification logic here
        // For example, update the status of the reservation
       // Reservation::find($this->reservationId)->update(['verified' => true]);

        // Emit an event to notify other components about the verification
      //  $this->emit('reservationVerified');

      return response('he');
    }

   
    public function render()
    {
        return view('livewire.sprovider.verify-reservation-component');
    }
}
