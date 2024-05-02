<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\client;
use App\Models\Reservation;

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

    public function mount($service_id)
    {
        $this->service_id = $service_id;
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

        $client = new client();
        $client->user_id = $user_id;
        $client->name = $this->client_name;
        $client->email = $this->client_email;
        $client->phone = $this->client_phone;
        $client->city = $this->client_city;
        $client->adresse = $this->client_adresse;

        $client->save();

        $reservation = new Reservation();
        $reservation->service_id = $this->service_id;
        $reservation->client_id = $client->id;
        $reservation->serviceprovider_id = null;
        $reservation->status = 'en attent';
        $reservation->date = $this->day;
        $reservation->time = $this->time;

        $reservation->save();
        session()->flash('message', 'Reservation created successfully');
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
        return view('livewire.customer.reservation-form-component',['timeSlots'=>$timeSlots,'cities' => $cities])->layout('layouts.base');
    }
}
