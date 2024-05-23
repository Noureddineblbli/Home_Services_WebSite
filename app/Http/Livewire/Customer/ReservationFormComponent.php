<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use App\Models\client;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceProviderNotification;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ReservationFormComponent extends Component
{
    public $client_id;
    public $client_name;
    public $client_email;
    public $client_phone;
    public $reservation_city;
    public $reservation_address;
    public $status;
    public $day;
    public $time;
    public $service_id;
    public $serviceProviders;
    public $client;
    public $reservation;
    public $message;
    public $categoryId;

    public function mount($service_id)
    {
        $this->service_id = $service_id;
        if(Auth::user()){
            $this->client_name = auth()->user()->name;
            $this->client_email = auth()->user()->email;
            $this->client_phone = auth()->user()->phone;
            $this->reservation_address = auth()->user()->address;
            $this->reservation_city = auth()->user()->city;
        }
        
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'client_name' => 'required',
            'client_email' => 'required|email|max:255',
            'client_phone' => 'required|min:10',
            'reservation_city' => 'required',
            'reservation_address' => 'required',
            'day' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);
    }

    public function createReservation($user_id)
    {
        $this->validate([
            'client_name' => 'required',
            'client_email' => 'required|email|max:255',
            'client_phone' => 'required|min:10',
            'reservation_city' => 'required',
            'reservation_address' => 'required',
            'day' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        
        $client = Client::where('phone', $this->client_phone)
        ->where('email', $this->client_email)
        ->where('name', $this->client_name)
        ->first();

        if ($client) {
            $this->reservation = new Reservation();
            $this->reservation->service_id = $this->service_id;
            $this->reservation->client_id = $client->id;
            $this->reservation->serviceprovider_id = null;
            $this->reservation->status = 'en attent';
            $this->reservation->date = $this->day;
            $this->reservation->time = $this->time;
            $this->reservation->city = $this->reservation_city;
            $this->reservation->address = $this->reservation_address;

            $this->reservation->save();

            $this->notifyServiceProviders();

        } else {
            $this->client = new client();
            $this->client->user_id = $user_id;
            $this->client->name = $this->client_name;
            $this->client->email = $this->client_email;
            $this->client->phone = $this->client_phone;
            $this->client->save();

            $this->reservation = new Reservation();
            $this->reservation->service_id = $this->service_id;
            $this->reservation->client_id = $this->client->id;
            $this->reservation->serviceprovider_id = null;
            $this->reservation->status = 'en attent';
            $this->reservation->date = $this->day;
            $this->reservation->time = $this->time;
            $this->reservation->city = $this->reservation_city;
            $this->reservation->address = $this->reservation_address;
    
            $this->reservation->save();
            $this->notifyServiceProviders();


        }


        $this->dispatchBrowserEvent('swal:reservationCreated', [
            'title' => 'Réservation créée avec succès!',
            'text' => 'Votre réservation a été créée avec succès. Vous devez attendre qu\'un prestataire de services accepte votre réservation. Vous serez informé par email lorsque cela se produira.',
            'icon' => 'success',
        ]);

       
    }

    public function notifyServiceProviders(){

        $this->categoryId = Service::where('id', $this->service_id)->value('service_category_id');
        $this->serviceProviders = User::select('users.name', 'users.email')
       ->join('service_providers as sp', 'users.id', '=', 'sp.user_id')
       ->where('sp.service_category_id', $this->categoryId)
       ->where('users.city', $this->reservation_city)
       ->get();


        foreach ( $this->serviceProviders as $serviceProvider) {
            $email = $serviceProvider->email;

            Mail::to($email)->send(new ServiceProviderNotification($this->reservation, $this->client,$serviceProvider));
            
        }
        $this->serviceProviders;
       


    }



    public function render()
    {
        $timeSlots = [
            '9:00', '9:30','10:00', '10:30', '11:00', '11:30','12:00', '12:30', '13:00', '13:30','14:00', '14:30', '15:00', '15:30','16:00', '16:30', '17:00', '17:30','18:00', '18:30', '19:00', '19:30','20:00' 
        ];
        $cities = [
             'Agadir','Asilah','Azrou','Beni Mellal','Berrechid','Boujdour','Casablanca','Chefchaouen','Dakhla','El Jadida','Essaouira','Errachidia','Fez','Guelmim','Ifrane','Kenitra','Khenifra','Ksar el-Kebir','Khouribga','Laayoune','Larache','Lixus','Marrakech','Meknes','Midelt','Nador','Ouarzazate','Oujda','Rabat','Safi','Sefrou','Sidi Ifni','Sidi Kacem','Sidi Slimane','Skhirat','Tangier','Tan-Tan','Taourirt','Taroudant','Taza','Tétouan','Tinghir','Tiznit'   
        ];

        return view('livewire.customer.reservation-form-component',['timeSlots'=>$timeSlots,'cities' => $cities,'service'])->layout('layouts.base');
    }
}
