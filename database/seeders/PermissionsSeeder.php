<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
