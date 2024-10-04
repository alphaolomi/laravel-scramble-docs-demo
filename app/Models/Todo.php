<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'is_completed',
        'completed_at',
        'due_date',
        'parent_id',
        'user_id',
    ];

    protected $hidden = [
        'user_id'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'due_date' => 'datetime',
        'is_completed' => 'boolean',
    ];

    // belong to User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
