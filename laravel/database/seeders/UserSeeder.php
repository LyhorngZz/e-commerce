<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@test.com'], // UNIQUE KEY
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        $manager = User::updateOrCreate(
            ['email' => 'manager@test.com'],
            [
                'name' => 'Manager User',
                'password' => Hash::make('password'),
            ]
        );

        $staff1 = User::updateOrCreate(
            ['email' => 'staff1@test.com'],
            [
                'name' => 'Staff One',
                'password' => Hash::make('password'),
            ]
        );

        $staff2 = User::updateOrCreate(
            ['email' => 'staff2@test.com'],
            [
                'name' => 'Staff Two',
                'password' => Hash::make('password'),
            ]
        );

        // Attach roles safely (no duplicates)
        $admin->roles()->syncWithoutDetaching(
            Role::where('name', 'admin')->pluck('id')
        );

        $manager->roles()->syncWithoutDetaching(
            Role::where('name', 'manager')->pluck('id')
        );

        $staffRole = Role::where('name', 'staff')->pluck('id');

        $staff1->roles()->syncWithoutDetaching($staffRole);
        $staff2->roles()->syncWithoutDetaching($staffRole);
    }
}
