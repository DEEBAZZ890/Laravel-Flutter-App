<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'content',
        'type',
        'points',
    ];

    // Question belongs to a Quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Question has many Answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
