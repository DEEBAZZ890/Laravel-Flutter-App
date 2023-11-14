<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;


    protected $fillable = [
        'quiz_attempt_id',
        'user_id',
        'score',
        'passed',
        'feedback',
    ];

    // Result belongs to a QuizAttempt
    public function quizAttempt()
    {
        return $this->belongsTo(QuizAttempt::class);
    }

    // Result belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
