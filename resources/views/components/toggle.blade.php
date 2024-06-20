<!-- resources/views/components/toggle.blade.php -->

@props(['checked' => false, 'name'])

<label for="{{ $name }}" class="flex items-center cursor-pointer">
    <div class="relative">
        <input id="{{ $name }}" type="checkbox" class="sr-only" name="{{ $name }}" {{ $checked ? 'checked' : '' }}>
        <div class="block toggle-color w-14 h-8 rounded-full"></div>
        <div class="dot absolute left-1 top-1 toggle-color2 w-6 h-6 rounded-full transition"></div>
    </div>
    <div class="ml-3 text-gray-700 font-medium">
        {{ $slot }}
    </div>
</label>

<style>
    input:checked + .block {
        background-color: #2A3D80;
    }

    input:checked + .block + .dot {
        transform: translateX(100%);
    }

    input:checked + .block + .dot {
        background-color: #3eaa9d;
    }

    .dot {
        transition: transform 0.3s ease-in-out;
    }
</style>
