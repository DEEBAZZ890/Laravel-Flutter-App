<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_id',
        'content',
        'action_link',
    ];

    // Recommendation belongs to a Result
    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}
