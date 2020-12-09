<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;

class Create extends Component
{
    public $name;
    public $phone;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|max:15'
        ]);
        
        Contact::create(['name' => $this->name, 'phone' => $this->phone]);

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
        return view('livewire.contact.create');
    }
}
