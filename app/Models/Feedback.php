<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'rating',
        'comment',
    ];

    // Feedback belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Feedback belongs to a Quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
