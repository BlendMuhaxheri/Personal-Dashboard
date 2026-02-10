@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-2xl font-bold mb-4">
        Weekly Review
    </h1>

    <p class="text-gray-600 mb-8">
        Week of {{ $startDate->format('M d') }} – {{ $endDate->format('M d, Y') }}
    </p>

    {{-- TASK SUMMARY --}}
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-3">Tasks</h2>

        <p>Total Created: <strong> {{ $stats['tasksCreated'] }}</strong></p>
        <p>Total Completed: <strong>{{ $stats['tasksCompleted'] }}</strong></p>
        <p>Completion Rate: <strong>{{ $stats['completionRate'] }}%</strong></p>
    </div>

    {{-- HABIT SUMMARY --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-3">Habits</h2>

        @foreach ($habits as $habit)
        <div class="flex justify-between border-b py-2">
            <p>{{ $habit->name }} → {{ $habit->weekly_checkins }} check-ins</p>
        </div>
        @endforeach
    </div>

</div>
@endsection