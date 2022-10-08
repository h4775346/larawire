<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{

    public $userData;


    protected function rules()
    {
        return [
            'userData.name' => ['required', 'string', 'max:255'],
            'userData.email' => ['required', 'email', 'max:255', "unique:users,email," . $this->userData->id ],
            'userData.photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    public function updated()
    {
        $this->validate();
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
        $this->emit('update',$this->userData);
    }

}
