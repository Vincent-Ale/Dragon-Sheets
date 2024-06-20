<!-- resources/views/settings/index.blade.php -->

<x-menu />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Paramètres de l\'application
        </h2>
    </x-slot>

    <div class="bg-gravel w-72 h-16 ml-2.5 flex items-center justify-center rounded-lg mt-4">
        <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-center items-center justify-center pt-2 ">
            <h1 class="font-volk-cyan text-4xl" >Paramètres</h1>
        </div>
    </div>


    <div class="mx-auto">
        <div class="p-6 sm:px-20">
        

            <form method="POST" action="{{ route('settings.update') }}">
                @csrf
                @method('PUT')

                <div class="mt-6 text-gray-500">
                    <div>
                        <strong class="font-trade-orange text-2xl">Thème de couleur</strong>
                        <select name="color_theme" id="color_theme" class="font-volk-cyan block w-full mt-4 bg-blue-char rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="blue" {{ ($settings['color_theme'] ?? '') == 'blue' ? 'selected' : '' }}>Blue</option>
                            <option value="green" {{ ($settings['color_theme'] ?? '') == 'green' ? 'selected' : '' }}>Green</option>
                            <option value="red" {{ ($settings['color_theme'] ?? '') == 'red' ? 'selected' : '' }}>Red</option>
                            <option value="yellow" {{ ($settings['color_theme'] ?? '') == 'yellow' ? 'selected' : '' }}>Yellow</option>
                            <option value="purple" {{ ($settings['color_theme'] ?? '') == 'purple' ? 'selected' : '' }}>Purple</option>
                        </select>
                    </div>
                    <p class="font-trade-orange text-2xl mt-16">Options</p>
                    <div class="mt-4">
                        <x-toggle class="" name="virtual_dices" :checked="$settings['virtual_dices'] ?? false">
                            <span class="font-volk-cyan text-xl">Dés virtuels</span>
                        </x-toggle>
                    </div>
                    <div class="mt-4">
                        <x-toggle name="musical_theme" :checked="$settings['musical_theme'] ?? false">
                            <span class="font-volk-cyan text-xl">Thème musical</span>
                        </x-toggle>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Enregistrer les paramètres
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
