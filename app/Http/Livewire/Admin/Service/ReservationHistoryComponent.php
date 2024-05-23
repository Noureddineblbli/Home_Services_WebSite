<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationHistoryComponent extends Component
{
    
    public function showReservationDetails($id)
    {
        return redirect()->to(route('reservations.show', ['id' => $id]));
    }

    public function render()
    {
        $reservations = DB::table('reservations as r')
           ->join('services as s', 'r.service_id', '=', 's.id')
           ->join('clients as c', 'r.client_id', '=', 'c.id')
           ->select('r.id','s.name as service_name', 'c.name as client_name', 'r.date', 'r.time', 'r.created_at', 'r.status')
           ->paginate(15);

        return view('livewire.admin.service.reservation-history-component',['reservations' => $reservations])->layout('layouts.dashboardLayout');
    }
}
