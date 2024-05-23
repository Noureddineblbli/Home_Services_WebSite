<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{

    public function answerMessage($id)
    {
        return redirect()->to(route('contact.answer', ['id' => $id]));
    }
    public function render()
    {
        $contacts = Contact::paginate(15);
        return view('livewire.admin.service.admin-contact-component', ['contacts' => $contacts])->layout('layouts.dashboardLayout');
    }
}
