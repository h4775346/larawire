<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Show extends ModalComponent
{


    public User $userData;


    public function mount(User $user)
    {
        $this->userData = $user;
    }

    public function render()
    {
        return view('livewire.users.show');
    }



}
