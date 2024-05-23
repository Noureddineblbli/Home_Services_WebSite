<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;
use App\Mail\ContactReplyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminContactAnswerComponent extends Component
{
      
    public $contactInfo;
    public $subject;
    public $message;
    public function mount($id){

        $contactInfo = DB::table('contacts as c')
        ->select('c.name','c.email','c.phone','c.message')
        ->where('c.id',$id)
        ->first();

        $this->contactInfo = $contactInfo ? (array) $contactInfo : null;

    }

    public function submitForm()
    {
        $validatedData = $this->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Envoi de l'email (ou autre logique de réponse)
        Mail::to($this->contactInfo['email'])->send(new ContactReplyEmail($validatedData['subject'], $validatedData['message'],$this->contactInfo['name']));


        session()->flash('message', 'Votre réponse a été envoyée avec succès.');

        //return redirect()->route('admin.contact.answer', ['id' => $this->contactInfo['id']]);
    }
    public function render()
    {
        return view('livewire.admin.service.admin-contact-answer-component')->layout('layouts.dashboardLayout');
    }
}
