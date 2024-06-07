<x-navbar />
<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Combat for {{ $character->name }}
        </h2>

        <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('combats.update', $character) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Combat Parameters</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        @foreach ($character->combats as $combat)
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Health Point</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="combats[{{ $combat->id }}][health_point]" value="{{ $combat->health_point }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Armor Class</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="combats[{{ $combat->id }}][armor_class]" value="{{ $combat->armor_class }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Passive Perception</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="combats[{{ $combat->id }}][passive_perception]" value="{{ $combat->passive_perception }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Speed</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="combats[{{ $combat->id }}][speed]" value="{{ $combat->speed }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Initiative</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="combats[{{ $combat->id }}][initiative]" value="{{ $combat->initiative }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Spell Save DC</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="combats[{{ $combat->id }}][spell_save_dc]" value="{{ $combat->spell_save_dc }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Spell Bonus</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="combats[{{ $combat->id }}][spell_bonus]" value="{{ $combat->spell_bonus }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Dices of Life</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <select name="combats[{{ $combat->id }}][dices_of_life]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="6" {{ $combat->dices_of_life == 6 ? 'selected' : '' }}>6</option>
                                        <option value="8" {{ $combat->dices_of_life == 8 ? 'selected' : '' }}>8</option>
                                        <option value="10" {{ $combat->dices_of_life == 10 ? 'selected' : '' }}>10</option>
                                        <option value="12" {{ $combat->dices_of_life == 12 ? 'selected' : '' }}>12</option>
                                    </select>
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Spellcasting Ability</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <select name="combats[{{ $combat->id }}][spellcasting_ability]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="Intelligence" {{ $combat->spellcasting_ability == 'Intelligence' ? 'selected' : '' }}>Intelligence</option>
                                        <option value="Charisme" {{ $combat->spellcasting_ability == 'Charisme' ? 'selected' : '' }}>Charisme</option>
                                        <option value="Sagesse" {{ $combat->spellcasting_ability == 'Sagesse' ? 'selected' : '' }}>Sagesse</option>
                                    </select>
                                </dd>
                            </div>                            
                        @endforeach
                    </dl>
                </div>

                <div class="mt-4 flex space-x-2">
                    
                    @if ($character->is_created == true)

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                        Sauvegarder
                    </button>

                    @else

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                        Suivant
                    </button>

                    @endif

                    @if ($character->is_created == true)
                    
                    <a href="{{ route('combats.index', $character) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                        Annuler
                    </a>

                    @endif
                </div>
            </form>
        </div>
    </div>
</x-app-layout>