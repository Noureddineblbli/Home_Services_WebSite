<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class ReservationFormComponent extends Component
{
     
    public  $message ="hello world";

    

    public function render()
    {
        return view('livewire.customer.reservation-form-component')->layout('layouts.base');
    }
}
