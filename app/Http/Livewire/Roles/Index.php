<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    protected $listeners = ['refresh'];
    public $message = [];

    public function render()
    {
        return view('livewire.roles.index');
    }

    public function refresh(){
       $this->reset();
    }

}
