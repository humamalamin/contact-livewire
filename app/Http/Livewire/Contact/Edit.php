<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;

class Edit extends Component
{
    public $name;
    public $phone;
    public $contactId;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($modelId)
    {
        $this->contactId = $modelId;

        $model = Contact::find($this->contactId);
        $this->phone = $model->phone;
        $this->name = $model->name;
    }

    public function store()
    {
        $contact = Contact::find($this->contactId);

        $contact->update(['name' => $this->name, 'phone' => $this->phone]);
        $this->emit('modelStore');

        $this->resetField();
    }

    public function resetField()
    {
        $this->name = null; 
        $this->phone = null;
    }

    public function render()
    {
        return view('livewire.contact.edit');
    }
}
