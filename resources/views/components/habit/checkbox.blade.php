@props(['checked' => false])

<div
    class="h-5 w-5 rounded border flex items-center justify-center
        {{ $checked ? 'bg-emerald-600 border-emerald-600' : 'bg-white border-slate-300' }}"
    aria-hidden="true">
    @if($checked)
    <svg
        class="h-4 w-4 text-white"
        viewBox="0 0 20 20"
        fill="none"
        stroke="currentColor"
        stroke-width="3">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 10l4 4 8-8" />
    </svg>
    @endif
</div>