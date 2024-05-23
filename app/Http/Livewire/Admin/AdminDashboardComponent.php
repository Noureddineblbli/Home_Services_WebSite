<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use App\Models\ServiceProvider;

class AdminDashboardComponent extends Component
{

    public $pendingServiceProvidersCount;
    public $contactsCount;

    public function mount()
    {
        $this->pendingServiceProvidersCount = ServiceProvider::where('verified_by_admin', 0)->count();
        $this->contactsCount = Contact::all()->count();
    }

    public function viewPendingServiceProviders()
    {
        return redirect()->route('admin.service_providers.pending');
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.dashboardLayout');
    }
}
