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

    protected $casts = [
        'due_date' => 'date',
    ];


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'priority',
        'status',
    ];

    public function scopeOverdue($query)
    {
        return $query
            ->where('status', TaskStatus::ACTIVE)
            ->whereDate('due_date', '<', today())
            ->where('priority', TaskPriority::HIGH)
            ->orderByDesc('priority');
    }

    public function scopeToday($query)
    {
        return $query->where('status', TaskStatus::ACTIVE)
            ->whereDate('due_date', now())
            ->whereNull('completed_at')
            ->orderByDesc('priority');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
