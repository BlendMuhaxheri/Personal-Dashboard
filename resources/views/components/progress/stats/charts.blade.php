@props([
'tasksCreated' => 0,
'tasksCompleted' => 0,
'habitsCreated' => 0,
'habitsCompleted' => 0,
'habitSuccess' => 0,
'bestStreak' => 0,
])


<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Tasks This Week --}}
    <div class="border rounded-lg p-4">
        <h3 class="text-sm font-semibold mb-2">Tasks This Week</h3>

        <div class="h-40">
            <canvas id="tasksChart"></canvas>
        </div>
    </div>

    {{-- Habit Success --}}
    <div class="border rounded-lg p-4">
        <h3 class="text-sm font-semibold mb-2">Habit Success</h3>

        <div class="flex items-center gap-6">
            <div class="h-40 w-32">
                <canvas id="habitChart"></canvas>
            </div>

            <div>
                <p class="text-2xl font-semibold">80%</p>
                <p class="text-sm text-slate-600 mt-1">Best Streak</p>
                <p class="text-sm text-slate-600">7 days</p>
            </div>
        </div>
    </div>

</div>