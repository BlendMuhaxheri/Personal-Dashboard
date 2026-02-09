@extends('layouts.app')

@section('page-title', 'Edit Task')

@section('content')
<div class="flex justify-center mt-10">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-sm border border-slate-200">

        {{-- Card header --}}
        <h2 class="text-lg font-semibold text-slate-800 mb-6">
            Edit task
        </h2>

        <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <x-form.input
                name="title"
                label="Title"
                value="{{ old('title', $task->title) }}"
                required />

            {{-- Description --}}
            <x-form.textarea
                name="description"
                label="Description">
                {{ old('description', $task->description) }}
            </x-form.textarea>

            {{-- Due Date --}}
            <x-form.input
                name="due_date"
                label="Due date"
                type="date"
                value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}" />

            {{-- Priority --}}
            <x-form.select name="priority" label="Priority">
                <option value="">Select priority</option>

                <option value="low"
                    @selected(old('priority', $task->priority) === 'low')>
                    Low
                </option>

                <option value="medium"
                    @selected(old('priority', $task->priority) === 'medium')>
                    Medium
                </option>

                <option value="high"
                    @selected(old('priority', $task->priority) === 'high')>
                    High
                </option>
            </x-form.select>

            {{-- Actions --}}
            <div class="flex justify-end gap-3 pt-4">
                <a
                    href="{{ route('dashboard') }}"
                    class="text-sm text-slate-500 hover:text-slate-700">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700
                           text-white text-sm font-medium
                           px-5 py-2 rounded-md transition">
                    Update Task
                </button>
            </div>
        </form>

    </div>
</div>
@endsection