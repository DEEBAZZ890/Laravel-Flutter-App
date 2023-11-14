<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'total_questions',
        'active_status',
        'is_published',
    ];

    // Quiz belongs to a Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Quiz has many Questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Quiz has many QuizAttempts
    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    // Add a method to enforce maximum question limit
    public function setTotalQuestionsAttribute($value)
    {
        if ($value > 20) {
            // Throw an exception or handle the error as needed
            throw new \Exception('Maximum of 20 questions allowed per quiz.');
        }
        $this->attributes['total_questions'] = $value;
    }
}
