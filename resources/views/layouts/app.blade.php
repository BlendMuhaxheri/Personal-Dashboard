<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Personal Ops Dashboard')</title>

    {{-- Tailwind via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen">

    {{-- Top Navigation --}}
    <nav class="bg-white border-b shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="font-semibold text-lg">
                Ops Dashboard
            </div>

            <span class="text-lg text-slate-500">
                {{ now()->format('l, F j') }}
            </span>

            <div class="space-x-4 text-sm">
                <!-- <a href="/dashboard" class="text-gray-700 hover:text-black">Dashboard</a>
                <a href="/tasks" class="text-gray-700 hover:text-black">Tasks</a>
                <a href="/habits" class="text-gray-700 hover:text-black">Habits</a>
                <a href="/weekly-review" class="text-gray-700 hover:text-black">Weekly Review</a> -->
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button class="text-red-600 hover:text-red-800">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="max-w-7xl mx-auto px-4 py-6">
        @yield('content')
    </main>
    @include('components.layout.footer')

</body>

</html>