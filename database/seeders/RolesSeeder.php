<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'manage quizzes']);
        Permission::create(['name' => 'participate in quizzes']);
        // Add more permissions as necessary

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('manage quizzes');

        $lecturerRole = Role::create(['name' => 'lecturer']);
        $lecturerRole->givePermissionTo('manage quizzes');

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo('participate in quizzes');
    }
}
