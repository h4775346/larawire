<?php

namespace App\Http\Livewire\Users;


use App\Models\User;
use App\Traits\Sweety;
use Livewire\Component;

class Index extends Component
{
    use Sweety;

    protected $listeners = ['show', 'delete', 'destroy'];

    public function render()
    {
        return view('livewire.users.index');
    }

    public function show($id)
    {
        $this->emit('openModal', 'users.show', ['user' => $id]);
    }

    public function delete($ids)
    {
        $this->showConfirm('warning', 'Please Confirm This Process', 'destroy', ['ids' => $ids]);
    }

    public function destroy($data)
    {
        User::query()->whereIn('id',$data["ids"])->delete();
        $this->showModal("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

}
