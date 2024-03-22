@props(['value' => null])

<label {{  $attributes->merge(['class' => 'block text-sm text-zinc-700 font-medium mb-1']) }}>
    {{ $value ?? $slot }}
</label>
