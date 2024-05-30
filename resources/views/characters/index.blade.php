<x-app-layout>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of characters
        </h2>
    </x-slot>

    {{-- <a href="{{ route('characters.create') }}">Create a new character</a> --}}
    <ul> 
        @foreach ($characters as $character )
            
            
            <li>
                <a href="{{ route('characters.show', $character) }}">
                
                    {{ $character->name }}
                </a>
            </li>
        
        @endforeach
    </ul>

    <a href="{{ route('characters.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">Créer un personnage</a>

</x-app-layout>