<?php

namespace App\Http\Livewire\Roles;

use App\Traits\Sweety;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    use Sweety;

    protected $listeners = ['show', 'create', 'edit', 'update', 'delete', 'destroy'];

    public function render()
    {
        return view('livewire.roles.index');
    }

    public function show($id)
    {
        $this->emit('openModal', 'roles.show', ['role' => $id]);
    }

    public function edit($id)
    {
        $this->emit('openModal', 'roles.edit', ['role' => $id]);
    }


    public function create($role, $permissions = [])
    {
        $role = Role::query()->updateOrCreate(['name' => $role['name'],]);
        $role->syncPermissions($permissions);
        $this->showToast("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

    /**
     * @param array $role
     */
    public function update(array $role)
    {

         Role::findOrFail($role["id"])->update($role);
        $this->showToast("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

    /**
     * Update the given verified role's profile information.
     * @param  $role
     * @param Role | MustVerifyEmail $oldRole
     * @return void
     */
    protected function updateVerifiedRole($role, Role|MustVerifyEmail $oldRole)
    {
        $oldRole->forceFill([
            'name' => $role["name"],
            'email' => $role["email"],
            'email_verified_at' => null,
        ])->save();
    }


    public function delete($ids)
    {
        $this->showConfirm('warning', 'Please Confirm This Process', 'destroy', ['ids' => $ids]);
    }

    public function destroy($data)
    {
        Role::query()->whereIn('id', $data["ids"])->delete();
        $this->showToast("success", "Process Done Successfully");
        $this->emit('closeModal');
        $this->emit('reload');
        $this->reset();
    }

}
