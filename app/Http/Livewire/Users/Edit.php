<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{

    use WithFileUploads;

    public $userData;
    public $photo;


    protected function rules()
    {
        return [
            'userData.name' => ['required', 'string', 'max:255'],
            'userData.email' => ['required', 'email', 'max:255', "unique:users,email," . $this->userData->id],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(User $user)
    {
        $this->userData = $user;
    }

    public function render()
    {
        return view('livewire.users.edit');
    }

    public function update()
    {
        $this->validate();
        if ($this->photo) {
            $this->userData->updateProfilePhoto($this->photo);
        }
        $this->emit('update', $this->userData,$this->photo);
    }

}
