<!-- create.blade.php -->

<x-menu />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Music') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('musics.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <label for="tag" class="block text-gray-700 text-sm font-bold mb-2">Tag:</label>
                        <input type="text" name="tag" id="tag" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <label for="music_file" class="block text-gray-700 text-sm font-bold mb-2">Music File:</label>
                        <input type="file" name="music_file" id="music_file" class="form-input rounded-md shadow-sm mt-1 block w-full" accept="audio/mpeg, audio/mp3" required />
                    </div>

                    <div class="flex items-center m-4">
                        <a href="{{ route('musics.index') }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            retour
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-4 rounded">
                            Add Music
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
