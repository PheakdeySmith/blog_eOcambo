<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = [
            'create article', 'edit article', 'delete article', 'publish article', 'view article'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo($permissions);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo(['create article', 'edit article', 'publish article']);

        $viewer = Role::create(['name' => 'viewer']);
        $viewer->givePermissionTo('view article');
    }
}

