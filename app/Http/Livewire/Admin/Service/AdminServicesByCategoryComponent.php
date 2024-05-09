<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServicesByCategoryComponent extends Component
{
    use WithPagination;
    public $category_slug;
    public $delete_id;

    protected $listeners = ['ActionConfirmed' => 'deleteService'];

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

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
        $category = ServiceCategory::where('slug', $this->category_slug)->first();
        $services = Service::where('service_category_id', $category->id)->paginate(10);
        return view('livewire.admin.service.admin-services-by-category-component', ['category_name' => $category->name, 'services' => $services])->layout('layouts.dashboardLayout');
    }
}
