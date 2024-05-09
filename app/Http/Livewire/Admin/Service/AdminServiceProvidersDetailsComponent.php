<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use App\Models\ServiceProvider;

class AdminServiceProvidersDetailsComponent extends Component
{
    public $SproviderId;

    public function mount($sprovider_id) {
        $this->SproviderId = $sprovider_id;
        
    }
    public function render()
    {
        $sprovider = ServiceProvider::where('id',$this->SproviderId)->first();
        return view('livewire.admin.service.admin-service-providers-details-component', ['sprovider' => $sprovider])->layout('layouts.dashboardLayout');
    }
}
