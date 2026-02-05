@props([
'tasksCreated' => 0,
'tasksCompleted' => 0,
'habitsCreated' => 0,
'habitsCompleted' => 0,
'habitSuccess' => 0,
'bestStreak' => 0,
])

{{-- Tasks Completed --}}
<div class="flex items-center justify-between text-sm">
    <div class="flex items-center gap-2">
        <span
            class="inline-flex items-center justify-center w-5 h-5 rounded bg-blue-500 text-white text-xs">
            ✓
        </span>
        <span>Tasks Completed</span>
    </div>

    <span class="font-semibold">
        {{ $tasksCompleted }} / {{ $tasksCreated }}
    </span>
</div>

<x-layout.hr />

{{-- Habits Completed --}}
<div class="flex items-center justify-between text-sm">
    <div class="flex items-center gap-2">
        <span
            class="inline-flex items-center justify-center w-5 h-5 rounded bg-green-500 text-white text-xs">
            ✓
        </span>
        <span>Habits Completed</span>
    </div>

    <span class="font-semibold">
        {{ $habitsCompleted }} / {{ $habitsCreated }}
    </span>
</div>
<x-layout.hr />