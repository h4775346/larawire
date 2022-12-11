<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class Edit extends ModalComponent
{

    use WithFileUploads;

    public User $userData;
    public $photo;
    public $allRoles;
    public $selectedRoles = [];


    protected function rules()
    {
        return [
            'userData.name' => ['required', 'string', 'max:255'],
            'userData.email' => ['required', 'email', 'max:255', "unique:users,email," . $this->userData->id],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    public function mount(User $user)
    {

        can_or_abort("users.update");

        $this->userData = $user;
        $this->allRoles = Role::all();
        $this->selectedRoles = $this->userData->getRoleNames()->toArray();

    }

    public function render()
    {
        return view('livewire.users.edit');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function update()
    {
        $this->validate();
        if ($this->photo) {
            $this->userData->updateProfilePhoto($this->photo);
        }
        $this->userData->syncRoles($this->selectedRoles);
        $this->emit('update', $this->userData, $this->photo);
    }

}
