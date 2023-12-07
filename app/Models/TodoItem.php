<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'title',
        'content',
        'completed',
        'user_id',
    ];


    // casts
    protected $casts = [
        'completed' => 'boolean',
    ];
}
