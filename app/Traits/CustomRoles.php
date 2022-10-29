<?php

namespace App\Traits;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

trait CustomRoles
{

    use HasRoles;

    public function permissions_name() {
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }

    public function assignRole($roles, string $guard = null)
    {
        $roles = \is_string($roles) ? [$roles] : $roles;
        $guard = $guard ? : $this->getDefaultGuardName();

        $roles = collect($roles)
            ->flatten()
            ->map(function ($role) use ($guard) {
                return $this->getStoredRole($role, $guard);
            })
            ->each(function ($role) {
                $this->ensureModelSharesGuard($role);
            })
            ->all();

        $this->roles()->saveMany($roles);

        $this->forgetCachedPermissions();

        return $this;
    }

    protected function getStoredRole($role, string $guard): Role
    {
        if (\is_string($role)) {
            return app(Role::class)->findByName($role, $guard);
        }

        return $role;
    }

}
