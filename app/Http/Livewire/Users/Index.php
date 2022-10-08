<?php

namespace App\Http\Livewire\Users;


use App\Models\User;
use App\Traits\Sweety;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\UploadedFile;
use Livewire\Component;

class Index extends Component
{
    use Sweety;

    protected $listeners = ['show', 'edit', 'update', 'delete', 'destroy'];

    public function render()
    {
        return view('livewire.users.index');
    }

    public function show($id)
    {
        $this->emit('openModal', 'users.show', ['user' => $id]);
    }

    public function edit($id)
    {
        $this->emit('openModal', 'users.edit', ['user' => $id]);
    }


    /**
     * @param User $user
     *
     */
    public function update($user,$photo = null)
    {

        $oldUser = User::findOrFail($user["id"]);

        if ($user["email"] !== $oldUser->email &&
            $oldUser instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $oldUser);
        } else {
            $oldUser->forceFill([
                'name' => $user["name"],
                'email' => $user["email"],
            ])->save();
        }
        $this->showModal("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

    /**
     * Update the given verified user's profile information.
     * @param  $user
     * @param User | MustVerifyEmail $oldUser
     * @return void
     */
    protected function updateVerifiedUser($user, User|MustVerifyEmail $oldUser)
    {
        $oldUser->forceFill([
            'name' => $user["name"],
            'email' => $user["email"],
            'email_verified_at' => null,
        ])->save();
    }


    public function delete($ids)
    {
        $this->showConfirm('warning', 'Please Confirm This Process', 'destroy', ['ids' => $ids]);
    }

    public function destroy($data)
    {
        User::query()->whereIn('id', $data["ids"])->delete();
        $this->showModal("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

}
