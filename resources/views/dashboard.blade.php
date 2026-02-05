@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')

<div class="grid grid-cols-2 gap-6">
    <x-task.task-card :tasks="$tasks" />
    <x-habit.habit-card :habits="$habits" />
    <x-task.overdue-task-card :overdueTasks="$overdueTasks" />
    <x-progress.progress-chart />
</div>

@endsection