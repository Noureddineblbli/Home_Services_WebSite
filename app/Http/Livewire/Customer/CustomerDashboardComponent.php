<?php

namespace App\Http\Livewire\Customer;

use App\Models\Reservation;
use App\Models\client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerDashboardComponent extends Component
{
    public $reservations;
    public $clientId;

    public function mount() {
        $this->clientId=client::where('user_id',Auth::user()->id)->value('id');
        $this->reservations=Reservation::all()->where('client_id',$this->clientId);
    }
    public function render()
    {
        return view('livewire.customer.customer-dashboard-component')->layout('layouts.base');
    }
}
