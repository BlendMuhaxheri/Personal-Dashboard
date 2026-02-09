<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Personal Ops Dashboard')</title>

    {{-- Tailwind via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

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
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button class="text-red-600 hover:text-red-800">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </nav>

    {{-- Page Content --}}
    <main class="flex-1 px-4 py-6">

        {{-- Container wrapper (dashboard vs forms) --}}
        <div class="@yield('container-class', 'max-w-7xl mx-auto')">
            @yield('content')
        </div>

    </main>

    {{-- Footer --}}
    @include('components.layout.footer')

</body>

</html>