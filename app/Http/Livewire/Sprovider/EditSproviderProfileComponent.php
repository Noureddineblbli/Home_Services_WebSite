<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class EditSproviderProfileComponent extends Component
{
    use WithFileUploads;
    public $service_provider_id;
    public $image;
    public $about;
    public $city;
    public $service_category_id;
    public $service_location;

    public $newimage;

    public function mount()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $this->service_provider_id = $sprovider->id;
        $this->image = $sprovider->image;
        $this->about = $sprovider->about;
        $this->city = $sprovider->user->city;
        $this->service_category_id = $sprovider->service_category_id;
        $this->service_location = $sprovider->user->address;
    }

    public function updateProfile()
    {
        $user=User::where('id', Auth::user()->id)->first();
        $sprovider = ServiceProvider::where('user_id', $user->id)->first();

        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('sproviders', $imageName);
            $sprovider->image = $imageName;
        }

        $sprovider->about = $this->about;
        $user->city = $this->city;
        $sprovider->service_category_id = $this->service_category_id;
        $user->address = $this->service_location;
        $sprovider->save();
        $user->save();

        session()->flash('message', 'Profile has been updated successfully!');
    }

    public function render()
    {
        $cities = [
            'Agadir','Asilah','Azrou','Beni Mellal','Berrechid','Boujdour','Casablanca','Chefchaouen','Dakhla','El Jadida','Essaouira','Errachidia','Fez','Guelmim','Ifrane','Kenitra','Khenifra','Ksar el-Kebir','Khouribga','Laayoune','Larache','Lixus','Marrakech','Meknes','Midelt','Nador','Ouarzazate','Oujda','Rabat','Safi','Sefrou','Sidi Ifni','Sidi Kacem','Sidi Slimane','Skhirat','Tangier','Tan-Tan','Taourirt','Taroudant','Taza','Tétouan','Tinghir','Tiznit'   
        ];
        $scategories = ServiceCategory::all();
        return view('livewire.sprovider.edit-sprovider-profile-component', ['scategories' => $scategories,'cities' => $cities])->layout('layouts.SVPdashboardLayout');
    }
}
