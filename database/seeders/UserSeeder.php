<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password', // Plain text, will be hashed automatically
        ]);
        $admin->assignRole('admin');

        // Create a lecturer user
        $lecturer = User::create([
            'name' => 'Lecturer User',
            'email' => 'lecturer@example.com',
            'password' => 'password', // Plain text, will be hashed automatically
        ]);
        $lecturer->assignRole('lecturer');

        // Create a student user
        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => 'password', // Plain text, will be hashed automatically
        ]);
        $student->assignRole('student');
    }
}

