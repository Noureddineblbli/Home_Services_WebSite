<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\Service;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ServiceProvider;
use App\Http\Livewire\Customer\ReservationFormComponent;

class SproviderDashboardComponent extends Component
{


    //public  $user_id;
    public  $sprovider_id;
    public  $categorie;
    public  $reservations;

    public function mount($id)
    {
        // $this->user_id = $id;
        $this->sprovider_id = ServiceProvider::where('user_id',  $id)->value('id');

        $this->categorie = ServiceProvider::where('id', $this->sprovider_id)->value('service_category_id');


        // Your category ID


        // Retrieve reservations
        $this->reservations = Reservation::select('clients.name', 'clients.Adresse', 'clients.email', 'clients.phone', 'reservations.date', 'reservations.time', 'reservations.id')
            ->join('clients', 'reservations.client_id', '=', 'clients.id')
            ->join('services', 'reservations.service_id', '=', 'services.id')
            ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
            ->join('service_providers', 'service_categories.id', '=', 'service_providers.service_category_id')
            ->where('service_categories.id', $this->categorie)
            ->where('reservations.status', 'en attent')
            ->get();

        // Store the result in a variable
        //$reservationsData = $reservations->toArray();



    }

    public function verifyReservation($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        $reservation->status = 'confirmé';
        $reservation->save();
    }

    public function render()
    {
        return view('livewire.sprovider.sprovider-dashboard-component', ['reservations' => $this->reservations])->layout('layouts.base');
    }
}
