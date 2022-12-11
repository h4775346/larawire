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

        $usersPermissions = [
            'users.index',
            'users.create',
            'users.update',
            'users.delete',
        ];

        $serversPermissions = [
            'servers.all',
            'servers.index',
            'servers.create',
            'servers.update',
            'servers.delete',
        ];

        $devicesPermissions = [
            'devices.all',
            'devices.index',
            'devices.create',
            'devices.update',
            'devices.delete',
        ];

        $usersGiven = array_merge($serversPermissions, $devicesPermissions);
        unset($usersGiven["devices.all"]);
        unset($usersGiven["servers.all"]);

        foreach (array_merge($usersPermissions, $serversPermissions, $devicesPermissions) as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }
//
//        foreach (array_merge($usersPermissions, $serversPermissions, $devicesPermissions) as $permission) {
//            Permission::create(['name' => $permission, 'guard_name' => 'api']);
//        }


        $superAdmin = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);

        $user = Role::create(['name' => 'user', 'guard_name' => 'web']);

        $user->givePermissionTo($usersGiven);

        $superAdmin->givePermissionTo(array_merge($usersPermissions, $serversPermissions, $devicesPermissions));
    }
}
