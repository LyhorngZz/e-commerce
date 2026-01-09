<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create permissions safely
        $permissions = [
            'users.manage',

            'products.create',
            'products.update',
            'products.delete',

            'categories.create',
            'categories.update',
            'categories.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission
            ]);
        }

        // 2. Get roles
        $admin = Role::where('name', 'admin')->firstOrFail();
        $manager = Role::where('name', 'manager')->firstOrFail();
        $staff = Role::where('name', 'staff')->firstOrFail();

        // 3. Assign permissions to roles

        // Admin → all permissions
        $admin->permissions()->sync(
            Permission::pluck('id')
        );

        // Manager permissions
        $manager->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'products.update',
                'categories.create',
                'categories.update',
            ])->pluck('id')
        );

        // Staff permissions
        $staff->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'categories.create',
            ])->pluck('id')
        );
    }
}
