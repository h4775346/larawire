<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{


    public User $userData;
    protected $listeners = ['reload'];


    public function mount(User $user)
    {
        $this->userData = $user;
    }

    public function reload()
    {
        $this->userData = User::findOrFail($this->userData->id);
    }

    public function render()
    {
        can_or_abort("users.index");
        return view('livewire.users.show');
    }


}
