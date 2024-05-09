<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;

    public $delete_id;

    protected $listeners = ['ActionConfirmed' => 'deleteSlide'];

    public function deleteConfirmation($id) {
        $this->delete_id= $id;
        $this->dispatchBrowserEvent('show-confirmation');
        
    }

    public function deleteSlide()
    {
        $slide = Slider::find($this->delete_id);
        unlink('images/slider/' . $slide->image);
        $slide->delete();
        session()->flash('message', 'Slide has been deleted successfully!');
    }
    public function render()
    {
        $slides = Slider::paginate(10);
        return view('livewire.admin.service.admin-slider-component', ['slides' => $slides])->layout('layouts.dashboardLayout');
    }
}
