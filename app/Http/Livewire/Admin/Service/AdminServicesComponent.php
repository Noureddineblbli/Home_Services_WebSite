<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCategory;

class AdminServicesComponent extends Component
{
    use WithPagination;

    public $categoryFilter;
    public $delete_id;

    protected $listeners = ['ActionConfirmed' => 'deleteService'];

    public function deleteConfirmation($id) {
        $this->delete_id= $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Êtes-vous sûr de vouloir supprimer ce service ?',
            'text' => "",
            'icon' => 'warning',
            'confirmButtonText' => 'Oui, supprimez-le !',
            'cancelButtonText' => 'Non, annulez !',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33'
        ]);
        
    }

    public function deleteService()
    {
        $service = Service::find($this->delete_id);

        if ($service->thumbnail) {
            unlink('images/services/thumbnails' . '/' . $service->thumbnail);
        }

        if ($service->image) {
            unlink('images/services' . '/' . $service->image);
        }

        $service->delete();
        $this->dispatchBrowserEvent('swal:response', [
            'title' => 'Supprimé !',
            'text' => 'le service a été supprimé.',
            'icon' => 'success',
        ]);


    }

    public function render()
    {
        $categories = ServiceCategory::all();
        $services = Service::when($this->categoryFilter, function ($query, $categoryId) {
            return $query->where('service_category_id', $categoryId);
        })->paginate(10);
        return view('livewire.admin.service.admin-services-component', ['services' => $services,'categories'=>$categories])->layout('layouts.dashboardLayout');
    }
}
