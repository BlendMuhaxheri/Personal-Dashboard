<footer class="mt-8">
    <div class="bg-white border border-slate-200 rounded-xl px-6 py-4">
        <div class="flex flex-wrap justify-center gap-4">

            {{-- Quick Add Task --}}
            <a href="{{ route('tasks.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Quick Add Task
            </a>

            {{-- Weekly Review --}}
            <a href="{{route('weekly.review')}}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-300 bg-white text-slate-700 text-sm font-medium hover:bg-slate-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                View Weekly Review
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{route('logout')}}">
                @csrf

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-300 bg-white text-slate-700 text-sm font-medium hover:bg-slate-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                    </svg>
                    Logout
                </button>
            </form>

        </div>
    </div>
</footer>