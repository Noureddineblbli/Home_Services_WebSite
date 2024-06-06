<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\ServiceProvider;

class SproviderReviewsDetailsComponent extends Component
{
    public $sprovider;
    public $reviews;

    public function mount($id)
    {
        $this->sprovider = ServiceProvider::findOrFail($id);
        $this->reviews = $this->sprovider->reviews()->with('user')->get();
    }

    public function render()
    {
        return view('livewire.sprovider.sprovider-reviews-details-component')->layout('layouts.SVPdashboardLayout');
    }
}
