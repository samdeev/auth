@props(['field'])

@error($field)
    <p class="text-sm font-medium text-red-400 mt-1">{{ $message }}</p>
@enderror
