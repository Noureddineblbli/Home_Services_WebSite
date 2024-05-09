<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use App\Models\ServiceProvider;

class AdminPendingServiceProvidersComponent extends Component
{
    public $PendingSProviders;
    
    public function mount()  {
        $this->PendingSProviders = ServiceProvider::where('verified_by_admin',0)->get();
    }
    
    public function render()
    {
        return view('livewire.admin.service.admin-pending-service-providers-component')->layout('layouts.dashboardLayout');
    }
}
