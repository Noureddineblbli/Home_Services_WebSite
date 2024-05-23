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
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Êtes-vous sûr de vouloir supprimer cette catégorie de service ?',
            'text' => "",
            'icon' => 'warning',
            'confirmButtonText' => 'Oui, supprimez-la !',
            'cancelButtonText' => 'Non, annulez !',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33'
        ]);
        
    }

    public function deleteServiceCategory()
    {
        $scategory = ServiceCategory::find($this->delete_id);

        if ($scategory->image) {
            unlink('images/categories' . '/' . $scategory->image);
        }

        $scategory->delete();
        $this->dispatchBrowserEvent('swal:response', [
            'title' => 'Supprimé !',
            'text' => 'la catégorie de service a été supprimé.',
            'icon' => 'success'
        ]);   
    }

    public function render()
    {
        $scategories = ServiceCategory::paginate(10);
        return view('livewire.admin.service.admin-service-category-component', ['scategories' => $scategories])->layout('layouts.dashboardLayout');
    }
}
