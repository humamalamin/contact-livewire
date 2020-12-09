<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $action;
    public $selectedId;
    public $search;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'modelStore'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function modelStore()
    {

    }

    public function delete($id)
    {
        Contact::destroy($id);
    }

    public function selectItem($action, $selectedId)
    {
        $this->selectedId = $selectedId;
        $this->action = $action;

        if ($this->action == 'edit') {
            $this->emit('getModelId', $selectedId);
        } else {
            $this->delete($this->selectedId);
        }
    }

    public function render()
    {
        return view('livewire.contact.index', [
            'contacts' => $this->search === null ? Contact::orderBy('name', 'asc')->paginate(5): 
                            Contact::where('name', 'like', '%'.$this->search.'%')
                                ->orWhere('phone', 'like', '%'. $this->search.'%')->orderBy('name', 'asc')->paginate(5)
        ])
        ->extends('layouts.app');
    }
}
