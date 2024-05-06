<?php

namespace App\Http\Livewire\Customer;

use App\Models\client;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceProviderNotification;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;

class ReservationFormComponent extends Component
{
    public $client_id;
    public $client_name;
    public $client_email;
    public $client_phone;
    public $client_city;
    public $client_adresse;
    public $status;
    public $day;
    public $time;
    public $service_id;
    public $serviceProviders;
    public $client;
    public $reservation;
    public $message;
  //  public $validateservice;


    public function mount($service_id)
    {
        $this->service_id = $service_id;
      //  $this->validateservice = new SproviderDashboardComponent();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'client_name' => 'required',
            'client_email' => 'required|email|max:255',
            'client_phone' => 'required|min:10',
            'client_city' => 'required',
            'client_adresse' => 'required',
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
            'client_city' => 'required',
            'client_adresse' => 'required',
            'day' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        $this->client = new client();
        $this->client->user_id = $user_id;
        $this->client->name = $this->client_name;
        $this->client->email = $this->client_email;
        $this->client->phone = $this->client_phone;
        $this->client->city = $this->client_city;
        $this->client->adresse = $this->client_adresse;

        $this->client->save();

        $this->reservation = new Reservation();
        $this->reservation->service_id = $this->service_id;
        $this->reservation->client_id = $this->client->id;
        $this->reservation->serviceprovider_id = null;
        $this->reservation->status = 'en attent';
        $this->reservation->date = $this->day;
        $this->reservation->time = $this->time;

        $this->reservation->save();
        session()->flash('message', 'Reservation created successfully');

        $this->notifyServiceProviders();
    }

    public function render()
    {
        $timeSlots = [
            '9:00', '9:30','10:00', '10:30', 
            '11:00', '11:30','12:00', '12:30', 
            '13:00', '13:30','14:00', '14:30', 
            '15:00', '15:30','16:00', '16:30', 
            '17:00', '17:30','18:00', '18:30', 
            '19:00', '19:30','20:00' 
        ];
        $cities = [
             'Agadir',
             'Asilah',
             'Azrou',
             'Beni Mellal',
             'Berrechid',
             'Boujdour',
             'Casablanca',
             'Chefchaouen',
             'Dakhla',
             'El Jadida',
             'Essaouira',
             'Errachidia',
             'Fez',
             'Guelmim',
             'Ifrane',
             'Kenitra',
             'Khenifra',
             'Ksar el-Kebir',
             'Khouribga',
             'Laayoune',
             'Larache',
             'Lixus',
             'Marrakech',
             'Meknes',
             'Midelt',
             'Nador',
             'Ouarzazate',
             'Oujda',
             'Rabat',
             'Safi',
             'Sefrou',
             'Sidi Ifni',
             'Sidi Kacem',
             'Sidi Slimane',
             'Skhirat',
             'Tangier',
             'Tan-Tan',
             'Taourirt',
             'Taroudant',
             'Taza',
             'Tétouan',
             'Tinghir',
             'Tiznit'   
        ];
        return view('livewire.customer.reservation-form-component',['timeSlots'=>$timeSlots,'cities' => $cities,'service','message'=>$this->message])->layout('layouts.base');
    }



    public function notifyServiceProviders(){

        
        $this->serviceProviders = ServiceProvider::where('city', $this->client_city)->with('user')->get();

        foreach ( $this->serviceProviders as $serviceProvider) {
            $email = $serviceProvider->user->email;

          //  $this->validateservice->validateService($this->client,$this->reservation);

            Mail::to($email)->send(new ServiceProviderNotification($this->reservation, $this->client));
            
        }
        $this->message="emails send successfully";


    }

    public  function reservation()
    {
        return $this->reservation;
        
    }
    public  function client()
    {
        return $this->client;
        
    }

    public  function Sproviders()
    {
        return $this->serviceProviders;
        
    }
}
