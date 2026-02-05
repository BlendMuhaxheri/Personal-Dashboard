@props([
'label' => null,
'name',
'type' => 'text',
])

<div class="space-y-1">
    @if ($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-700">
        {{ $label }}
    </label>
    @endif

    <input
        {{ $attributes->merge([
            'id' => $name,
            'name' => $name,
            'type' => $type,
            'class' => 'block w-full rounded-md border-slate-300 shadow-sm
                        focus:border-blue-500 focus:ring-blue-500'
        ]) }} />

    <x-form.error :name="$name" />
</div>