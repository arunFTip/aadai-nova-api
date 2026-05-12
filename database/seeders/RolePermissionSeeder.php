<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'admin.view',
            'admin.create',
            'admin.update',
            'admin.delete',

            'user.view',
            'user.create',
            'user.update',
            'user.delete',

            'activity-log.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        $superAdmin->syncPermissions($permissions);
        $admin->syncPermissions([
            'admin.view',
            'user.view',
            'activity-log.view',

        ]);
        $user->syncPermissions([
            'user.view',
        ]);
    }
}
