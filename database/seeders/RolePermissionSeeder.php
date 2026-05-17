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

            'settings.view',
            'settings.localization.manage',
            'settings.security.manage',
            'settings.preferences.manage',
            'settings.branding.manage',
            'settings.notifications.manage',
            'settings.integrations.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'sanctum',
            ]);
        }

        $superAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
            'guard_name' => 'sanctum',
        ]);
        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'sanctum',
        ]);
        $user = Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => 'sanctum',
        ]);

        $superAdmin->syncPermissions($permissions);

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
