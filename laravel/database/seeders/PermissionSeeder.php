<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name'=>'user.manage'],
            ['name'=>'products.create'],
            ['name'=>'products.update'],
            ['name'=>'products.delete'],
            ['name'=>'categories.create'],
            ['name'=>'categories.update'],
            ['name'=>'categories.delete'],
        ]);

        $admin = Role::where('name', 'admin')->first();
        $manager = Role::where('name', 'manager')->first();
        $staff = Role::where('name', 'staff')->first();

        $admin->permissions()->sync(Permission::all()->pluck('id'));
        $manager->permissions()->sync(Permission::whereIn('name', [
            'products.create',
            'products.update',
            
            'categories.create',
            'categories.update',
            
        ])->pluck('id'));
        $staff->permissions()->sync(Permission::whereIn('name', [
            'products.create',
            'categories.create',
        ])->pluck('id'));
    }
}
