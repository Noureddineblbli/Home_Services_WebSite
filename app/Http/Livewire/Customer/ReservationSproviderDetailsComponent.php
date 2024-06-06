<?php

namespace App\Http\Livewire\Customer;

use App\Models\ServiceProvider;
use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReservationSproviderDetailsComponent extends Component
{
    public $SproviderId;
    public $rating;
    public $comment;

    public function mount($SproviderId){
        $this->SproviderId=$SproviderId;
    }

    public function submitReview()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review=Review::where('user_id',Auth::id())->where('service_provider_id',$this->SproviderId)->first();
        if($review){
            $review->rating=$this->rating;
            $review->comment=$this->comment;
            $review->save();
        }
        else{
            Review::create([
                'user_id' => Auth::id(),
                'service_provider_id' => $this->SproviderId,
                'rating' => $this->rating,
                'comment' => $this->comment,
            ]);
        }

        $this->dispatchBrowserEvent('swal:reservationCreated', [
            'title' => 'Avis soumis!',
            'text' => 'Merci pour votre avis. Votre retour est précieux pour nous et les autres utilisateurs. N\'hésitez pas à consulter d\'autres services sur notre site.',
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        $sprovider=ServiceProvider::where('id',$this->SproviderId)->first();
        return view('livewire.customer.reservation-sprovider-details-component',['sprovider'=>$sprovider])->layout("layouts.base");
    }
}
