@props(['overdueTasks'])

<div class="w-full">
    {{-- TASK CARD --}}
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-sm border border-slate-200 p-8">

        {{-- Header --}}
        <h3 class="text-xl font-semibold text-slate-800">
            Overdue Tasks
        </h3>

        <x-layout.hr />

        {{-- Overdue Task row --}}
        @forelse ($overdueTasks as $task)
        <div class="flex items-center gap-4 py-4 border-b border-slate-200 justify-between">

            <div class="flex items-center gap-4 flex-1">
                <x-task.checkbox />

                <x-task.title>
                    {{ $task->title }}
                </x-task.title>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-sm font-medium px-3 py-1 rounded-full bg-red-100 text-red-800">
                    Overdue
                </span>

                <x-task.overdue-task-button :action="route('tasks.edit', $task)" />
            </div>
        </div>

        @empty
        <p class="text-sm text-slate-500 py-6 text-center">
            No overdue tasks 🎉
        </p>
        @endforelse
    </div>
</div>