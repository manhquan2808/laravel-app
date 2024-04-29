<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Livewire;

class BtnRoles extends Component
{
   
    public function openModal()
    {
        // $this->dispatchBrowserEvent('modal', ['action' => 'show']);
        // Gọi component Livewire
        $this->dispatchBrowserEvent('show-form');

    }
    
    public function render()
    {
        return view('livewire.btn-roles');
    }
}
