<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class RoleComponent extends Component
{
    public $state = [
        'role_name' => '',
        'nickname' => '',
    ];

    public function updated(string $field)
    {
        $this->validateOnly($field);
    }

    protected $rules = [
        'state.role_name' => ['required', 'min:3'],
        'state.nickname' => ['nullable']
    ];
    public function addRole()
    {
        $validatedData = Validator::make($this->state, [
            "role_name" => 'required|string',
            "nickname" => 'required|string|unique:roles',
        ], [
            'role_name.required' => 'Tên chức vụ không được để trống.',
            'nickname.required' => 'Viết tắt của tên chức vụ không được để trống.',
            'nickname.unique' => 'Tên viết tắt đã tồn tại.'
        ])->validate();

        // Add Role data
        Role::create($validatedData);


        $this->dispatchBrowserEvent('hide-form');
    }

    public function render()
    {
        return view('livewire.role-component');
    }
}
