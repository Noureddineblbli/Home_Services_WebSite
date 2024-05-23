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

    protected $listeners = [
        'acceptConfirmed' => 'acceptServiceProvider',
        'rejectConfirmed' => 'rejectServiceProvider'
    ];

    public function acceptConfirmation($id) {
        $this->PendingSproviderId= $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Êtes-vous sûr?',
            'text' => "Vous souhaitez accepter ce prestataire!",
            'icon' => 'warning',
            'confirmButtonText' => 'Oui!',
            'cancelButtonText' => 'Non, annulez !',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'action' => 'accept'
        ]);
        
    }

    public function rejectConfirmation($id) {
        $this->PendingSproviderId= $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Êtes-vous sûr?',
            'text' => "Vous souhaitez rejeter ce prestataire!",
            'icon' => 'warning',
            'confirmButtonText' => 'Oui!',
            'cancelButtonText' => 'Non, annulez !',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'action' => 'reject'
        ]);
        
    }

    public function acceptServiceProvider()
    {
        $provider = ServiceProvider::findOrFail($this->PendingSproviderId);
        $provider->verified_by_admin = 1;
        $provider->save();

        // Send verification email
        Mail::to($provider->user->email)->send(new ServiceProviderVerifiedMail($provider));

        $this->dispatchBrowserEvent('swal:response', [
            'title' => 'Accepté!',
            'text' => 'Le prestataire a été accepté.',
            'icon' => 'success',
            'redirectTo' => route('admin.service_providers.pending'), // Specify the redirection URL
        ]);
        
       
    }

    public function rejectServiceProvider()
    {
        $provider = ServiceProvider::findOrFail($this->PendingSproviderId);
        
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
