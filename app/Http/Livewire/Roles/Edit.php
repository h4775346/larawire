<?php

namespace App\Http\Livewire\Roles;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends ModalComponent
{

    use WithFileUploads;

    public Role $roleData;
    public $photo;
    public $allPermissions;
    public $selectedPermissions = [];


    protected function rules()
    {
        return [
            'roleData.name' => ['required', 'string', 'max:255',"unique:roles,name," . $this->roleData->id],
        ];
    }

    public function mount(Role $role)
    {
        can_or_abort("roles.update");
        $this->roleData = $role;
        $this->allPermissions = Permission::all();
        $this->selectedPermissions = $this->roleData->getPermissionNames();

    }

    public function render()
    {
        return view('livewire.roles.edit');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function update()
    {
        $this->validate();
        $this->roleData->syncPermissions($this->selectedPermissions);
        $this->emit('update', $this->roleData);
    }

}
