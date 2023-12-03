<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run()
    {
        // Retrieve all courses
        $courses = Course::all();

        foreach ($courses as $course) {
            Quiz::create([
                'course_id' => $course->id,
                'title' => "Quiz for " . $course->name,
                'description' => "Dummy description for the Quiz in " . $course->name . " course.",
                'total_questions' => 20,
                'active_status' => true,
                'is_published' => true
            ]);
        }
    }
}
