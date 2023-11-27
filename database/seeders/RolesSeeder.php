<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'permissions' => [
                    'course-browse', 'course-read', 'course-create', 'course-update', 'course-delete',
                    'quiz-browse', 'quiz-read', 'quiz-create', 'quiz-update', 'quiz-delete',
                    'question-browse', 'question-read', 'question-create', 'question-update', 'question-delete',
                    'user-browse', 'user-read', 'user-create', 'user-update', 'user-delete',
                    'quiz-attempt-browse', 'quiz-attempt-read', 'quiz-attempt-update',
                    'result-browse', 'result-read', 'result-update',
                    'feedback-browse', 'feedback-read', 'feedback-create', 'feedback-update', 'feedback-delete',
                    'audit-log-browse', 'audit-log-read',
                    'notification-browse', 'notification-read', 'notification-create', 'notification-update', 'notification-delete',
                    'recommendation-browse', 'recommendation-read', 'recommendation-create', 'recommendation-update', 'recommendation-delete',
                    'setting-browse', 'setting-read', 'setting-update',
                    'role-browse', 'role-read', 'role-create', 'role-update', 'role-delete',
                    'permission-browse', 'permission-read', 'permission-create', 'permission-update', 'permission-delete',
                ],
            ],
            [
                'name' => 'lecturer',
                'permissions' => [
                    'course-browse', 'course-read', 'course-create', 'course-update',
                    'quiz-browse', 'quiz-read', 'quiz-create', 'quiz-update',
                    'question-browse', 'question-read', 'question-create', 'question-update',
                    'result-browse', 'result-read', 'result-update',
                    'feedback-browse', 'feedback-read', 'feedback-create', 'feedback-update',
                    'audit-log-browse', 'audit-log-read',
                    'notification-browse', 'notification-read', 'notification-create', 'notification-update',
                    'recommendation-browse', 'recommendation-read', 'recommendation-create', 'recommendation-update',
                    'setting-browse', 'setting-read', 'setting-update',
                ],
            ],
            [
                'name' => 'student',
                'permissions' => [
                    'course-browse', 'course-read',
                    'quiz-browse', 'quiz-read',
                    'quiz-attempt-browse', 'quiz-attempt-read',
                    'result-browse', 'result-read',
                    'feedback-browse', 'feedback-read',
                    'notification-browse', 'notification-read',
                    'recommendation-browse', 'recommendation-read',
                ],
            ],
            // Additional roles if needed
        ];

        foreach ($roles as $role) {
            $newRole = Role::create(['name' => $role['name']]);
            foreach ($role['permissions'] as $permission) {
                $newRole->givePermissionTo($permission);
            }
        }
    }
}
