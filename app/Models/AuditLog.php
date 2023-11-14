<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'action_type',
        'description',
        'affected_model',
    ];

    // AuditLog belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
