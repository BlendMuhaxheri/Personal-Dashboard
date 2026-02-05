@extends('layouts.app')

@section('page-title', 'Add Task')

@section('content')
<div class="flex justify-center mt-10">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-sm border border-slate-200">

        {{-- Card header --}}
        <h2 class="text-lg font-semibold text-slate-800 mb-6">
            Create a new habit
        </h2>

        <form method="POST" action="{{ route('habits.store') }}" class="space-y-5">
            @csrf

            <x-form.input
                name="name"
                label="Name"
                value="{{ old('name') }}"
                required />

            <x-form.input
                name="frequency"
                label="Frequency"
                value="{{ old('frequency') }}"
                required />

            <x-form.input
                name="target_count"
                min="0" step="1"
                label="Count"
                type="number"
                value="{{ old('count') }}"
                required />

            {{-- Actions --}}
            <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                <a
                    href="{{ route('dashboard') }}"
                    class="text-sm text-slate-500 hover:text-slate-700">
                    Cancel
                </a>

                <button
                    type="submit"
                    class=" bg-emerald-500 hover:bg-emerald-600
                            text-white text-sm font-medium
                            px-5 py-2 rounded-md transition">
                    Create Habit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection