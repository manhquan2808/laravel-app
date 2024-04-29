<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleDatatable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $sortDirection = 'ASC';
    public $sortColumn = 'role_id';
    public function doSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }
    public function openModal()
    {
        $this->dispatchBrowserEvent('show-edit-form');

    }

    // protected $listeners = ['refreshdatatable' => '$refresh'];
    public function render()
    {
        return view('livewire.role-datatable', [
            'roles' => Role::search($this->search)
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }
}
