<?php

namespace App\Http\Livewire\Sprovider;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ServiceProvider;
use App\Mail\ReservationAccepted;
use Illuminate\Support\Facades\Mail;
use App\Http\Livewire\Customer\ReservationFormComponent;

class SproviderDashboardComponent extends Component
{

    public  $sprovider_id;
    public  $categorie;
    public  $reservations;
    public  $showHistory = false;
    public  $userId;
    public $city;
    public $reservationDetails;

    public function mount($id)
    {
        $this->userId= $id;
        $this->sprovider_id = ServiceProvider::where('user_id',  $id)->value('id');
        $this->city = ServiceProvider::select('service_providers.city')
        ->where('service_providers.id', $this->sprovider_id)
        ->pluck('service_providers.city');
    

        $this->categorie = ServiceProvider::where('id', $this->sprovider_id)->value('service_category_id');


           $this->reservations = Reservation::select('clients.name', 'reservations.adresse_maison', 'clients.email', 'clients.phone', 'reservations.date', 'reservations.time', 'reservations.id',
           'services.name as servicName')
            ->join('clients', 'reservations.client_id', '=', 'clients.id')
            ->join('services', 'reservations.service_id', '=', 'services.id')
            ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
            ->where('service_categories.id', $this->categorie)
            ->where('reservations.status', 'en attent')
            ->where('reservations.ville', $this->city)
            ->whereNotIn('reservations.id', function($query){
                $query->select('reservation_id')
                      ->from('prestataire_reservation_rejetee')
                      ->where('prestataire_id', $this->sprovider_id);
            })
           ->get();


    }

    public function toggleShowHistory()
    {
        $this->showHistory = !$this->showHistory;
        
           if($this->showHistory){
            $this->reservations = Reservation::select('clients.name', 'reservations.adresse_maison', 'clients.email', 'clients.phone', 'reservations.date', 'reservations.time','services.name as servicName')
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

        $this->reservationDetails = Reservation::select(
            'c.name as client_name',
            'c.email as client_email',
            'u.name as provider_name',
            'u.email as provider_email',
            'u.phone',
            'r.adresse_maison',
            'r.time',
            'r.date',
            'r.created_at as reservation_created_at',
            's.name as serviceName'
        )
        ->from('reservations as r') // Alias for reservations table
        ->join('clients as c', 'r.client_id', '=', 'c.id')
        ->join('service_providers as sp', 'r.serviceprovider_id', '=', 'sp.id')
        ->join('users as u', 'sp.user_id', '=', 'u.id')
        ->join('services as s', 's.id', '=', 'r.service_id')
        ->where('r.id', $reservationId)
        ->first();
    $reservationDetails = $this->reservationDetails;
    $reservationDetails->reservation_created_date = Carbon::parse($reservationDetails->reservation_created_at)->format('Y-m-d');
    $reservationDetails->reservation_created_time = Carbon::parse($reservationDetails->reservation_created_at)->format('H:i');

    Mail::to($reservationDetails->client_email)->send(new ReservationAccepted(
        $reservationDetails->client_name,
        $reservationDetails->provider_name,
        $reservationDetails->provider_email,
        $reservationDetails->phone,
        $reservationDetails->adresse_maison,
        $reservationDetails->time,
        $reservationDetails->date,
        $reservationDetails->reservation_created_date,
        $reservationDetails->reservation_created_time,
        $reservationDetails->serviceName));


    }
    public function rejeter($reservationId, $prestataireId)
    {
        $prestataire = ServiceProvider::find($prestataireId);
        $prestataire->reservationsRejetees()->attach($reservationId);
        $this->initialize($this->userId);
        
    }

    private function initialize($id)
{
    $this->sprovider_id = ServiceProvider::where('user_id',  $id)->value('id');

        $this->categorie = ServiceProvider::where('id', $this->sprovider_id)->value('service_category_id');


        $this->reservations = Reservation::select('clients.name', 'reservations.adresse_maison', 'clients.email', 'clients.phone', 'reservations.date', 'reservations.time', 'reservations.id',
        'services.name as servicName')
         ->join('clients', 'reservations.client_id', '=', 'clients.id')
         ->join('services', 'reservations.service_id', '=', 'services.id')
         ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
         ->where('service_categories.id', $this->categorie)
         ->where('reservations.status', 'en attent')
         ->where('reservations.ville', $this->city)
         ->whereNotIn('reservations.id', function($query){
             $query->select('reservation_id')
                   ->from('prestataire_reservation_rejetee')
                   ->where('prestataire_id', $this->sprovider_id);
         })
        ->get();

}
    

    public function render()
    {
        return view('livewire.sprovider.sprovider-dashboard-component', ['reservations' => $this->reservations,'city' =>$this->city,'reservationDetails'=>$this->reservationDetails ])->layout('layouts.base');
    }
}
