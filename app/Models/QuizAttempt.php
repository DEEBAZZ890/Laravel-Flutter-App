<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'attempt_number',
        'score',
        'completed_at',
    ];

    // QuizAttempt belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // QuizAttempt belongs to a Quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }



}
