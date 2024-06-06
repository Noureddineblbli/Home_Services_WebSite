<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SproviderProfileComponent extends Component
{
    public $averageRating;

    public function render()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $this->averageRating = $sprovider->reviews()->avg('rating');
        return view('livewire.sprovider.sprovider-profile-component', ['sprovider' => $sprovider])->layout('layouts.SVPdashboardLayout');
    }
}
