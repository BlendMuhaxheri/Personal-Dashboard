<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habit extends Model
{
    /** @use HasFactory<\Database\Factories\HabitFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'frequency',
        'target_count'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
