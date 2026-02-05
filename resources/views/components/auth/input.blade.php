@props([
'label' => null,
'type' => 'text',
'name',
])

<div>
    @if($label)
    <label class="block text-sm font-medium mb-1">
        {{ $label }}
    </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' =>
                'w-full rounded-md bg-slate-900 border border-slate-700
                 px-3 py-2 text-slate-100
                 focus:outline-none focus:border-indigo-500'
        ]) }} />

    @error($name)
    <p class="mt-1 text-sm text-red-400">
        {{ $message }}
    </p>
    @enderror
</div>