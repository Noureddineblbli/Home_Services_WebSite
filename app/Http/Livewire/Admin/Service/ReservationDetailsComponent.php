<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ReservationDetailsComponent extends Component
{
    public $reservationInfo;
    public $clientInfo;
    public $providerInfo;
    public $showReservationDetails = false;
    public $reservationId;

    public function mount($id)
    {
        $this->reservationId = $id;
    
        // Initialize properties as null
        $this->reservationInfo = null;
        $this->clientInfo = null;
        $this->providerInfo = null;
    
        // Fetch reservation information
        $reservationInfo = DB::table('reservations as r')
            ->join('services as s', 'r.service_id', '=', 's.id')
            ->select('s.name as service_name', 'r.date', 'r.time', 'r.created_at', 'r.status', 'r.address', 'r.city')
            ->where('r.id', $this->reservationId)
            ->first();
    
        // Fetch client information
        $clientInfo = DB::table('reservations as r')
            ->join('clients as c', 'r.client_id', '=', 'c.id')
            ->select('c.name as client_name', 'c.email', 'c.phone')
            ->where('r.id', $this->reservationId)
            ->first();
    
        // Fetch provider information
        $providerInfo = DB::table('reservations as r')
            ->join('service_providers as sp', 'r.serviceprovider_id', '=', 'sp.id')
            ->join('users as u', 'u.id', '=', 'sp.user_id')
            ->join('service_categories as sc', 'sc.id', '=', 'sp.service_category_id')
            ->select('u.name as provider_name', 'u.email as provider_email', 'u.phone as provider_phone', 'sc.name as service_category', 'sp.created_at as provider_created_at')
            ->where('r.id', $this->reservationId)
            ->first();
    
        // Set the properties after fetching data
        $this->reservationInfo = $reservationInfo ? (array)$reservationInfo : null;
        $this->clientInfo = $clientInfo ? (array)$clientInfo : null;
        $this->providerInfo = $providerInfo ? (array)$providerInfo : null;
    }
    

 
    public function render()
    {
        return view('livewire.admin.service.reservation-details-component')->layout('layouts.dashboardLayout');
    }
}
