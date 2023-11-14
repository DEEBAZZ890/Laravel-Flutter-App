<?php

namespace Database\Seeders;

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
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // You should use a secure password
        ]);
        $admin->assignRole('admin');

        // Create a lecturer user
        $lecturer = User::create([
            'name' => 'Lecturer User',
            'email' => 'lecturer@example.com',
            'password' => Hash::make('password'), // You should use a secure password
        ]);
        $lecturer->assignRole('lecturer');

        // Create a student user
        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('password'), // You should use a secure password
        ]);
        $student->assignRole('student');
    }
}
