<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'level',
        'is_published',
    ];

    // Course has many Quizzes
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
