<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'border bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition'
    ]) }}
>
    {{ $slot }}
</button>
