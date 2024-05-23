<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminContactAnswerComponent extends Component
{
      
    public $contactInfo;
    public function mount($id){

        $contactInfo = DB::table('contacts as c')
        ->select('c.name','c.email','c.phone','c.message')
        ->where('c.id',$id)
        ->first();

        $this->contactInfo = $contactInfo ? (array) $contactInfo : null;

    }
    public function render()
    {
        return view('livewire.admin.service.admin-contact-answer-component')->layout('layouts.dashboardLayout');
    }
}
