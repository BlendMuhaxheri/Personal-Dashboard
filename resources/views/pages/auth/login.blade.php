@extends('layouts.auth')

@section('title', 'Login')


@section('content')
<h2 class="text-2xl font-bold mb-8">
    Sign in
</h2>


<x-auth.form
    action="{{ route('login') }}"
    submit="Login">

    <x-auth.input
        name="email"
        type="email"
        label="Email address"
        required />

    <x-auth.input
        name="password"
        type="password"
        label="Password"
        required />
</x-auth.form>

<p class="mt-6 text-sm text-slate-400">
    Don't have an account yet?
    <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300">
        Register
    </a>
</p>

@endsection