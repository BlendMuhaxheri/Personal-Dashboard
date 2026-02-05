<?php

namespace App\Models;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'priority'
    ];

    public function scopeOverdue($query)
    {
        return $query
            ->where('status', TaskStatus::ACTIVE)
            ->where('due_date', '<', now())
            ->where('priority', TaskPriority::HIGH)
            ->orderByDesc('priority');
    }

    public function scopeToday($query)
    {
        return $query->where('status', TaskStatus::ACTIVE)
            ->whereDate('due_date', now())
            ->orderByDesc('priority');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
