@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')

<div class="grid grid-cols-2 gap-6">
    <x-task.task-card :tasks="$tasks" />
    <x-habit.habit-card :habits="$habits" />
    <x-task.overdue-task-card :overdueTasks="$overdueTasks" />
    <x-progress.progress-chart
        :tasks-created="$stats['tasksCreated']"
        :tasks-completed="$stats['tasksCompleted']"
        :habits-created="$stats['habitsCreated']"
        :habits-completed="$stats['habitsCompleted']"
        :habit-success="$stats['habitSuccess']"
        :best-streak="$stats['bestStreak']" />

</div>

@endsection