<?php

namespace App\Http\Livewire\Users;


use App\Models\User;
use App\Traits\Sweety;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class Index extends Component
{
    use Sweety;

    protected $listeners = ['show', 'create', 'edit', 'update', 'delete', 'destroy'];

    public function render()
    {
        can_or_abort("users.index");
        return view('livewire.users.index');
    }

    public function show($id)
    {
        can_or_abort("users.index");
        $this->emit('openModal', 'users.show', ['user' => $id]);
    }

    public function edit($id)
    {
        can_or_abort("users.update");
        $this->emit('openModal', 'users.edit', ['user' => $id]);
    }


    public function create($user, $roles = [])
    {
        can_or_abort("users.create");
        $user = User::query()->create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
        ]);
        $user->syncRoles($roles);
        $this->showToast("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

    /**
     * @param User $user
     *
     */
    public function update($user)
    {
        can_or_abort("users.update");
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
        $this->showToast("success", "Process Done Successfully");
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
        can_or_abort("users.delete");
        $this->showConfirm('warning', 'Please Confirm This Process', 'destroy', ['ids' => $ids]);
    }

    public function destroy($data)
    {
        can_or_abort("users.delete");
        User::query()->whereIn('id', $data["ids"])->delete();
        $this->showToast("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

}
