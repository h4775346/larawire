<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Collection;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class Create extends ModalComponent
{

    use WithFileUploads;

    public Collection $userData;
    public Collection $allRoles;
    public array $selectedRoles = ['user'];


    protected function rules()
    {
        return [
            'userData.name' => ['required', 'string', 'max:255'],
            'userData.email' => ['required', 'email', 'max:255', "unique:users,email"],
            'userData.password' => ['required', 'string', new Password, 'confirmed'],
            'selectedRoles'=>['required','array']
        ];
    }

    public function mount()
    {
        $this->userData = collect(["name", 'email', 'password', 'password_confirmation']);
        $this->allRoles = Role::all();

    }

    public function render()
    {
        return view('livewire.users.create');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function create()
    {
        $this->validate();
        $this->emit('create', $this->userData, $this->selectedRoles);
    }

}
