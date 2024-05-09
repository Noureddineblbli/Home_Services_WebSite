<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceCategoryComponent extends Component
{
    use WithPagination;

    public $delete_id;

    protected $listeners = ['ActionConfirmed' => 'deleteServiceCategory'];

    public function deleteConfirmation($id) {
        $this->delete_id= $id;
        $this->dispatchBrowserEvent('show-confirmation');
        
    }

    public function deleteServiceCategory()
    {
        $scategory = ServiceCategory::find($this->delete_id);

        if ($scategory->image) {
            unlink('images/categories' . '/' . $scategory->image);
        }

        $scategory->delete();
        session()->flash('message', 'Category has been deleted successfully!');
    }

    public function render()
    {
        $scategories = ServiceCategory::paginate(10);
        return view('livewire.admin.service.admin-service-category-component', ['scategories' => $scategories])->layout('layouts.dashboardLayout');
    }
}
