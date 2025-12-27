<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
        ]);

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@test.com',
            'password' => Hash::make('password'),
        ]);

        $staff1 = User::create([
            'name' => 'Staff User 1',
            'email' => 'staff1@test.com',
            'password' => Hash::make('password'),
        ]);

        $staff2 = User::create([
            'name' => 'Staff User 2',
            'email' => 'staff2@test.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach(Role::where('name', 'admin')->first());
        $manager->roles()->attach(Role::where('name', 'manager')->first());
        $staff1->roles()->attach(Role::where('name', 'staff')->first());
        $staff2->roles()->attach(Role::where('name', 'staff')->first());
    }
}