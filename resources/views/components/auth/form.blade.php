@props([
'action',
'method' => 'POST',
'submit'

])

<form
    method="{{$method}}"
    action="{{$action}}" ,
    class="space-y-5">

    @csrf

    {{$slot}}

    <button
        type="submit"
        class="w-full rounded-md bg-indigo-600 py-2 font-semibold
               hover:bg-indigo-500 transition">
        {{ $submit }}
    </button>