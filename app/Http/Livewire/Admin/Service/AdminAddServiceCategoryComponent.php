<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
    }

    public function createNewCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        if(ServiceCategory::where('slug',$this->slug)->first()){
            $this->dispatchBrowserEvent('swal:response', [
                'title' => '!!!!!',
                'text' => 'Cette catégorie de service existe déjà!',
                'icon' => 'warning'
            ]);
        }else{
            $scategory = new ServiceCategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('categories', $imageName);
            $scategory->image = $imageName;
            $scategory->save();
            session()->flash('message', 'La catégorie a été ajoutée avec succès !');
        }
    }

    public function render()
    {
        return view('livewire.admin.service.admin-add-service-category-component')->layout('layouts.dashboardLayout');
    }
}
