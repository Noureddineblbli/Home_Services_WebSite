<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceProviderRejectedMail;
use App\Mail\ServiceProviderVerifiedMail;

class AdminVerifyServiceProvidersComponent extends Component
{
    public $PendingSproviderId;

    public function mount($PendingSprovider_id) {
        $this->PendingSproviderId = $PendingSprovider_id;
        
    }

    public function verifyServiceProvider($id)
    {
        $provider = ServiceProvider::findOrFail($id);
        $provider->verified_by_admin = 1;
        $provider->save();

        // Send verification email
        Mail::to($provider->user->email)->send(new ServiceProviderVerifiedMail($provider));

        return redirect()->route('admin.service_providers.pending');
       
    }

    public function rejectServiceProvider($id)
    {
        $provider = ServiceProvider::findOrFail($id);
        
        Mail::to($provider->user->email)->send(new ServiceProviderRejectedMail($provider));

        $provider->user->delete();
        return redirect()->route('admin.service_providers.pending');

    }

    public function render()
    {
        $PendingSprovider = ServiceProvider::where('id',$this->PendingSproviderId)->first();
        return view('livewire.admin.service.admin-verify-service-providers-component', ['PendingSprovider' => $PendingSprovider])->layout('layouts.dashboardLayout');
    }
}
