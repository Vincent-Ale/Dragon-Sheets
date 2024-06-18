<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-modif ml-4 inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full']) }}>
    {{ $slot }}
</button>
