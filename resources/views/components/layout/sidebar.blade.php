<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Ops')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <x-layout.sidebar />

        {{-- Main content --}}
        <div class="flex-1 flex flex-col">
            {{-- Top navbar --}}
            <x-layout.navbar />

            {{-- Page content --}}
            <main class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>