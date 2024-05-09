<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServicesComponent extends Component
{
    use WithPagination;

    public $delete_id;

    protected $listeners = ['ActionConfirmed' => 'deleteService'];

    public function deleteConfirmation($id) {
        $this->delete_id= $id;
        $this->dispatchBrowserEvent('show-confirmation');
        
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
        session()->flash('message', 'Service has been deleted successfully!');


    }

    public function render()
    {
        $services = Service::paginate(10);
        return view('livewire.admin.service.admin-services-component', ['services' => $services])->layout('layouts.dashboardLayout');
    }
}
