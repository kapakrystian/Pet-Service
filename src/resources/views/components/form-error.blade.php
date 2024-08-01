@props(['name'])

@error($name)
    <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
@enderror
