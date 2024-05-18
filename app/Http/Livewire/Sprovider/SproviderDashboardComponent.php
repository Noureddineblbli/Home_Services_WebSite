<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\Service;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ServiceProvider;
use App\Http\Livewire\Customer\ReservationFormComponent;

class SproviderDashboardComponent extends Component
{


    
    public $sprovider_id;
    public $categorie;
    public $reservations;
    public $showHistory = false;
    public $userId;

    public function mount($id)
    {
        $this->userId= $id;
        $this->initialize($id);
        // $this->user_id = $id;
        $this->sprovider_id = ServiceProvider::where('user_id',  $id)->value('id');

        $this->categorie = ServiceProvider::where('id', $this->sprovider_id)->value('service_category_id');

           $this->reservations = Reservation::select('clients.name', 'clients.email', 'clients.phone', 'reservations.address', 'reservations.date', 'reservations.time', 'reservations.id',
           'services.name as serviceName')
            ->join('clients', 'reservations.client_id', '=', 'clients.id')
            ->join('services', 'reservations.service_id', '=', 'services.id')
            ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
            ->join('service_providers', 'service_categories.id', '=', 'service_providers.service_category_id')
            ->where('service_categories.id', $this->categorie)
            ->where('reservations.status', 'en attent')
            ->get();

    }

    public function toggleShowHistory()
    {
        $this->showHistory = !$this->showHistory;
        
           if($this->showHistory){
            $this->reservations = Reservation::select('clients.name', 'clients.email', 'clients.phone','reservations.address', 'reservations.date', 'reservations.time','services.name as servicName')
              ->join('clients', 'reservations.client_id', '=', 'clients.id')
              ->join('services', 'reservations.service_id', '=', 'services.id')
              ->where('reservations.serviceprovider_id', $this->sprovider_id)
              ->get();
            }
            else{
                $this->initialize($this->userId);
            }    
    }
      
    public function verifyReservation($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        $reservation->status = 'confirmé';
        $reservation->serviceprovider_id = $this->sprovider_id;
        $reservation->save();
        $this->initialize($this->userId);
    }

    private function initialize($id)
{
    $this->sprovider_id = ServiceProvider::where('user_id',  $id)->value('id');

        $this->categorie = ServiceProvider::where('id', $this->sprovider_id)->value('service_category_id');

        
           $this->reservations = Reservation::select('clients.name', 'clients.email', 'clients.phone','reservations.address', 'reservations.date', 'reservations.time', 'reservations.id','services.name as servicName')
            ->join('clients', 'reservations.client_id', '=', 'clients.id')
            ->join('services', 'reservations.service_id', '=', 'services.id')
            ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
            ->join('service_providers', 'service_categories.id', '=', 'service_providers.service_category_id')
            ->where('service_categories.id', $this->categorie)
            ->where('reservations.status', 'en attent')
            ->get();
}
    

    public function render()
    {
        return view('livewire.sprovider.sprovider-dashboard-component', ['reservations' => $this->reservations])->layout('layouts.base');
    }
}
