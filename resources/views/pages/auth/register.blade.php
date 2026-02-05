@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<h2 class="text-2xl font-bold mb-8">
    Create your account
</h2>

<x-auth.form
    action="{{ route('register') }}"
    submit="Register">
    @csrf

    <x-auth.input
        name="name"
        type="text"
        label="Name"
        required />
    <x-auth.input
        name="last_name"
        type="text"
        label="Last name"
        required />

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

    <x-auth.input
        name="password_confirmation"
        type="password"
        label="Confirm password"
        required />
</x-auth.form>

<p class="mt-6 text-sm text-slate-400">
    Already have an account?
    <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300">
        Sign in
    </a>
</p>
@endsection