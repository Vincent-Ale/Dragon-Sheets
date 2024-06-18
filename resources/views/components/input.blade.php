@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12']) !!}>
