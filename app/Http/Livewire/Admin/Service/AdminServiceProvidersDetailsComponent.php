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

    protected $listeners = [
        'acceptConfirmed' => 'inableAccount',
        'rejectConfirmed' => 'disableAccount'
    ];

    public function EnableConfirmation($id) {
        $this->SproviderId= $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Êtes-vous sûr?',
            'text' => "Vous souhaitez activer ce compte!",
            'icon' => 'warning',
            'confirmButtonText' => 'Oui!',
            'cancelButtonText' => 'Non, annulez !',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'action' => 'accept'
        ]);
        
    }

    public function DisableConfirmation($id) {
        $this->SproviderId= $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Êtes-vous sûr?',
            'text' => "Vous souhaitez Désactiver ce compte!",
            'icon' => 'warning',
            'confirmButtonText' => 'Oui!',
            'cancelButtonText' => 'Non, annulez !',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'action' => 'reject'
        ]);
        
    }

    public function disableAccount(){
        $serviceProvider = ServiceProvider::where('id',$this->SproviderId)->first();
        $serviceProvider->Activation = 0;
        $serviceProvider->save();

        $this->dispatchBrowserEvent('swal:response', [
            'title' => 'Désactivé!',
            'text' => 'Le compte a été désactivé avec succès.',
            'icon' => 'success'
        ]);
    }

    public function inableAccount(){
        $serviceProvider = ServiceProvider::where('id',$this->SproviderId)->first();
        $serviceProvider->Activation = 1;
        $serviceProvider->save();

        $this->dispatchBrowserEvent('swal:response', [
            'title' => 'Activé!',
            'text' => 'Le compte a été activé avec succès.',
            'icon' => 'success'
        ]);
    }

    public function render()
    {
        $sprovider = ServiceProvider::where('id',$this->SproviderId)->first();
        return view('livewire.admin.service.admin-service-providers-details-component', ['sprovider' => $sprovider])->layout('layouts.dashboardLayout');
    }
}
