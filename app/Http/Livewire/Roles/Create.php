<?php

namespace App\Http\Livewire\Roles;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class Create extends ModalComponent
{
    use LivewireAlert;

    public $role_name;

    protected $rules = [
        'role_name' => 'required|min:3|unique:roles,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.roles.create');
    }

    public function create(){
        $this->validate();
        Role::create(['name'=>$this->role_name]);
        $this->alert('success', 'Basic Alert');
        $this->emit('refresh');
        $this->closeModal();
    }

}
