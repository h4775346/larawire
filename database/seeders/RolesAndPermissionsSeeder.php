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

        $permissionsSuperAdmin = [
            'users.index',
            'users.create',
            'users.update',
            'users.destroy',
        ];

        $permissionsAdmin = [
            'sim.index',
            'sim.create',
            'sim.update',
            'sim.destroy',
        ];


        foreach ($permissionsSuperAdmin as $permission) {
            Permission::create(['name' => $permission,'guard_name' => 'web']);
        }

        foreach ($permissionsAdmin as $permission) {
            Permission::create(['name' => $permission,'guard_name' => 'api']);
        }


        $superAdmin = Role::create(['name' => 'super_admin','guard_name'=>'web']);

        $admin = Role::create(['name' => 'admin','guard_name'=>'api']);

        $admin->givePermissionTo($permissionsAdmin);

        $superAdmin->givePermissionTo($permissionsSuperAdmin);
    }
}
