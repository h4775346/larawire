<?php

namespace App\Http\Livewire\Roles;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class Show extends ModalComponent
{


    public Role $roleData;
    protected $listeners = ['reload'];


    public function mount(Role $role)
    {
        can_or_abort("roles.index");
        $this->roleData = $role;
    }

    public function reload()
    {
        $this->roleData = Role::findOrFail($this->roleData->id);
    }

    public function render()
    {
        return view('livewire.roles.show');
    }


}
