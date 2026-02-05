@props([
'tasksCreated' => 0,
'tasksCompleted' => 0,
'habitsCreated' => 0,
'habitsCompleted' => 0,
'habitSuccess' => 0,
'bestStreak' => 0,
])

<div class="bg-white rounded-xl border border-slate-200 p-6">
    <h2 class="text-lg font-semibold mb-4">Progress Summary</h2>

    {{-- Stats --}}
    <div class="space-y-4 mb-6">
        <x-progress.stats.stats
            :tasks-created="$tasksCreated"
            :tasks-completed="$tasksCompleted"
            :habits-created="$habitsCreated"
            :habits-completed="$habitsCompleted"
            :habit-success="$habitSuccess"
            :best-streak="$bestStreak" />
    </div>

    {{-- Charts --}}
    <x-progress.stats.charts />
</div>