<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $image;
    public $thumbnail;
    public $description;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => ['required','numeric',],
            'image' => 'required|mimes:png,jpg,jpeg',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
    }

    public function createService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => ['required','numeric',],
            'image' => 'required|mimes:png,jpg,jpeg',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);

        if(Service::where('slug',$this->slug)->first()){
            $this->dispatchBrowserEvent('swal:response', [
                'title' => '!!!!!',
                'text' => 'Ce service existe déjà!',
                'icon' => 'warning'
            ]);
        }else{
            $service = new Service();
            $service->name = $this->name;
            $service->slug = $this->slug;
            $service->tagline = $this->tagline;
            $service->service_category_id = $this->service_category_id;
            $service->price = $this->price;
            $service->description = $this->description;

            $imageName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
            $this->thumbnail->storeAs('services/thumbnails', $imageName);
            $service->thumbnail = $imageName;

            $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('services', $imageName2);
            $service->image = $imageName2;

            $service->save();
            session()->flash('message', 'Le service a été ajouté avec succès !');
        }

    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.service.admin-add-service-component', ['categories' => $categories])->layout('layouts.dashboardLayout');
    }
}
