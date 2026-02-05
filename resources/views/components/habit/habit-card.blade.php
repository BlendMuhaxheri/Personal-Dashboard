<div class="flex w-full mt-10 gap-8">
    {{-- HABIT CARD --}}
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-sm border border-slate-200 p-8">
        <h3 class="text-xl font-semibold text-slate-800">
            Today’s Habits
        </h3>

        <x-layout.hr />

        {{-- Habit row --}}
        @forelse ($habits as $habit)
        <div class="flex items-center gap-4 py-4 border-b border-slate-200 justify-between">

            <div class="flex items-center gap-4 flex-1">
                <x-habit.checkbox />

                <x-habit.title>
                    {{$habit->name}}
                </x-habit.title>
            </div>

            <div class="flex items-center gap-4">
                <x-habit.frequency>
                    {{$habit->frequency}}
                </x-habit.frequency>
                <x-habit.check-in-button />
            </div>
        </div>
        @empty
        <p class="text-sm text-slate-500 py-6 text-center">
            No habits for today 🎉
        </p>
        @endforelse
        <div class="mt-6">
            <x-habit.add-habit-button />
        </div>
    </div>
</div>