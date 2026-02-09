@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')

<div class="grid grid-cols-2 gap-6 items-start">

    {{-- LEFT COLUMN --}}
    <div class="flex flex-col gap-6">
        <x-task.task-card :tasks="$tasks" />
        <x-task.overdue-task-card :overdueTasks="$overdueTasks" />
    </div>

    {{-- RIGHT COLUMN --}}
    <div class="flex flex-col gap-6">
        <x-habit.habit-card :habits="$habits" />

        <x-progress.progress-chart
            :tasks-created="$stats['tasksCreated']"
            :tasks-completed="$stats['tasksCompleted']"
            :habits-created="$stats['habitsCreated']"
            :habits-completed="$stats['habitsCompleted']"
            :habit-success="$stats['habitSuccess']"
            :best-streak="$stats['bestStreak']" />
    </div>

</div>

@endsection