<!-- resources/views/settings/index.blade.php -->

<x-menu />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Paramètres de l\'application
        </h2>
    </x-slot>


    <div class="bg-white mx-auto">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">
               Vos paramètres
            </div>

            <form method="POST" action="{{ route('settings.update') }}">
                @csrf
                @method('PUT')

                <div class="mt-6 text-gray-500">
                    <div>
                        <strong>Thème de couleur :</strong>
                        <select name="color_theme" id="color_theme" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="blue" {{ ($settings['color_theme'] ?? '') == 'blue' ? 'selected' : '' }}>Blue</option>
                            <option value="green" {{ ($settings['color_theme'] ?? '') == 'green' ? 'selected' : '' }}>Green</option>
                            <option value="red" {{ ($settings['color_theme'] ?? '') == 'red' ? 'selected' : '' }}>Red</option>
                            <option value="yellow" {{ ($settings['color_theme'] ?? '') == 'yellow' ? 'selected' : '' }}>Yellow</option>
                            <option value="purple" {{ ($settings['color_theme'] ?? '') == 'purple' ? 'selected' : '' }}>Purple</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-toggle name="virtual_dices" :checked="$settings['virtual_dices'] ?? false">
                            Dés virtuels
                        </x-toggle>
                    </div>
                    <div class="mt-4">
                        <x-toggle name="musical_theme" :checked="$settings['musical_theme'] ?? false">
                            Thème musical
                        </x-toggle>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:bg-blue-600">
                        Enregistrer les paramètres
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
