@props(['tasks'])

<div class="flex w-full mt-10 gap-8 items-start">
    {{-- TASK CARD --}}
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-sm border border-slate-200 p-8">

        {{-- Header --}}
        <h3 class="text-xl font-semibold text-slate-800">
            Today’s Tasks
        </h3>

        <x-layout.hr />

        {{-- Task row --}}
        @forelse ($tasks as $task)
        <div class="flex items-center gap-4 py-4 border-b border-slate-200 justify-between">

            <div class="flex items-center gap-4 flex-1">
                <x-task.checkbox />

                <x-task.title>
                    {{ $task->title }}
                </x-task.title>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('tasks.edit', $task) }}"
                    title="Edit task"
                    class="text-gray-500 hover:text-blue-600 transition">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <x-task.mark-complete-button :action="route('tasks.mark-complete', $task)" />
            </div>
        </div>

        @empty
        <p class="text-sm text-slate-500 py-6 text-center">
            No tasks for today 🎉
        </p>
        @endforelse

        {{-- Add task --}}
        <div class="mt-6">
            <x-task.add-task-button :action="route('tasks.create')" />
        </div>
    </div>
</div>