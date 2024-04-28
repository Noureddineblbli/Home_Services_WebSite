<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceProviderRejectedMail;
use App\Mail\ServiceProviderVerifiedMail;

class AdminVerifyServiceProvidersComponent extends Component
{
    public $PendingSProviders;
    
    public function mount()  {
        $this->PendingSProviders = ServiceProvider::where('verified_by_admin',0)->get();
    }

    public function verifyServiceProvider($id)
    {
        $provider = ServiceProvider::findOrFail($id);
        $provider->verified_by_admin = 1;
        $provider->save();

        // Send verification email
        Mail::to($provider->user->email)->send(new ServiceProviderVerifiedMail($provider));

        // Refresh the list after verification
        $this->mount();
    }

    public function rejectServiceProvider($id)
    {
        $provider = ServiceProvider::findOrFail($id);
        
        Mail::to($provider->user->email)->send(new ServiceProviderRejectedMail($provider));

        $provider->user->delete();

        // Refresh the list after rejection
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.service.admin-verify-service-providers-component')->layout('layouts.base');
    }
}
