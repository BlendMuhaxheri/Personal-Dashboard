<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-800 text-slate-100">

    <main class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        {{-- Left side (branding / empty for now) --}}
        <div class="hidden lg:flex items-center justify-center bg-slate-900">
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <img
                        src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        class="h-12"
                        alt="Logo" />
                </div>
                <h1 class="text-3xl font-bold">Personal Ops</h1>
                <p class="mt-2 text-slate-400">
                    Plan. Execute. Review.
                </p>
            </div>
        </div>

        {{-- Right side (form content) --}}
        <div class="flex items-center justify-center px-6">
            <div class="w-full max-w-md">
                @yield('content')
            </div>
        </div>
    </main>

</body>

</html>