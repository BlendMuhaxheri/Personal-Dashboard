@props([
'label' => null,
'name',
])

<div class="space-y-1">
    @if ($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700">
        {{ $label }}
    </label>
    @endif

    <select
        {{ $attributes->merge([
            'id' => $name,
            'name' => $name,
            'class' => 'block w-full rounded-md border-slate-300 shadow-sm
                        focus:border-blue-500 focus:ring-blue-500'
        ]) }}>
        {{ $slot }}
    </select>

    <x-form.error :name="$name" />
</div>