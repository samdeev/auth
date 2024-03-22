<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'border bg-neutral-900 text-white py-2 px-4 rounded-md hover:bg-neutral-800 transition'
    ]) }}
>
    {{ $slot }}
</button>
