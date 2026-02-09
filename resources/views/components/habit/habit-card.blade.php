<div class="flex w-full mt-10 gap-8">
    {{-- HABIT CARD --}}
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-sm border border-slate-200 p-8">

        {{-- Header --}}
        <h3 class="text-xl font-semibold text-slate-800">
            Today’s Habits
        </h3>

        <x-layout.hr />

        {{-- Habit rows --}}
        @forelse ($habits as $habit)

        @php
        // Checked in today if there is at least one check-in row loaded
        $checkedInToday = $habit->habitCheckIns->isNotEmpty();
        @endphp

        <div class="flex items-center gap-4 py-4 border-b border-slate-200 justify-between">

            {{-- Left side --}}
            <div class="flex items-center gap-4 flex-1">

                {{-- Checkbox status --}}
                <x-habit.checkbox :checked="$checkedInToday" />

                {{-- Habit name --}}
                <x-habit.title>
                    {{ $habit->name }}
                </x-habit.title>
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-4">

                {{-- Frequency --}}
                <x-habit.frequency>
                    {{ $habit->frequency }}
                </x-habit.frequency>

                {{-- Button logic --}}
                @if (!$checkedInToday)
                {{-- Show check-in button --}}
                <x-habit.check-in-button
                    :action="route('habits.check-in', $habit)" />
                @endif

            </div>
        </div>

        @empty
        <p class="text-sm text-slate-500 py-6 text-center">
            No habits for today 🎉
        </p>
        @endforelse

        {{-- Add habit --}}
        <div class="mt-6">
            <x-habit.add-habit-button />
        </div>
    </div>
</div>