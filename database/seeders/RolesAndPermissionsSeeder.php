<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {

        $permissions = [
            'users.index',
            'users.create',
            'users.update',
            'users.destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Role::create(['name' => 'user']);
        $role = Role::create(['name' => 'super_admin']);
        $role->givePermissionTo($permissions);
    }
}
