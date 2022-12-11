<?php

namespace App\Http\Livewire\Roles;

use Illuminate\Support\Collection;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends ModalComponent
{
    use WithFileUploads;

    public Collection $roleData;
    public Collection $allPermissions;
    public array $selectedPermissions = [];


    protected function rules()
    {
        return [
            'roleData.name' => ['required', 'string', 'max:255', "unique:roles,name"],
            'selectedPermissions' => ['required', 'array']
        ];
    }

    public function mount()
    {
        can_or_abort("roles.create");
        $this->roleData = collect(["name"]);
        $this->allPermissions = Permission::all()->where("guard_name","web");
    }

    public function render()
    {
        return view('livewire.roles.create');
    }

    public function updated($param)
    {
        $this->validateOnly($param);
    }


//    public function updated($propertyName)
//    {
//        $this->validateOnly($propertyName);
//    }


    public function create()
    {
        $this->validate();
        $this->emit('create', $this->roleData, $this->selectedPermissions);
    }

}
