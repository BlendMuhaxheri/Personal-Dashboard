<header class="bg-white border-b border-slate-200 px-6 py-4 flex justify-between items-center">
    <h1 class="text-lg font-semibold">
        @yield('page-title', 'Dashboard')
    </h1>
    <span class="text-sm text-slate-500">
        {{ now()->format('l, F j') }}
    </span>
    <div class="flex items-center gap-4 text-sm">

        <a href="#" class="text-slate-600 hover:text-slate-900">Account</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-red-500 hover:text-red-600 font-medium">
                Logout
            </button>
        </form>
    </div>
</header>