<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Games & Intelligent Systems',
                'description' => 'Placeholder description for Games & Intelligent Systems.',
                'level' => 'Diploma',
                'is_published' => '1',
            ],
            [
                'name' => 'Front-end Web Dev',
                'description' => 'Placeholder description for Front-end Web Dev.',
                'level' => 'Diploma',
                'is_published' => '1',
            ],
            [
                'name' => 'Back-end Web Dev',
                'description' => 'Placeholder description for Back-end Web Dev.',
                'level' => 'Diploma',
                'is_published' => '1',
            ],
            [
                'name' => 'Advanced Programming',
                'description' => 'Placeholder description for Advanced Programming.',
                'level' => 'Diploma',
                'is_published' => '1',
            ],
            [
                'name' => 'Info Tech',
                'description' => 'Placeholder description for Info Tech.',
                'level' => 'Diploma',
                'is_published' => '1',
            ],
            [
                'name' => 'Web Dev',
                'description' => 'Placeholder description for Web Dev.',
                'level' => 'Cert IV',
                'is_published' => '1',
            ],
            [
                'name' => 'Games & Intelligent Systems',
                'description' => 'Placeholder description for Games & Intelligent Systems.',
                'level' => 'Cert IV',
                'is_published' => '1',
            ],
            [
                'name' => 'Programming',
                'description' => 'Placeholder description for Programming.',
                'level' => 'Cert IV',
                'is_published' => '1',
            ],
            [
                'name' => 'Info Tech',
                'description' => 'Placeholder description for Info Tech.',
                'level' => 'Cert III',
                'is_published' => '1',
            ],
            [
                'name' => 'Web Dev',
                'description' => 'Placeholder description for Web Dev.',
                'level' => 'Cert III',
                'is_published' => '1',
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}
