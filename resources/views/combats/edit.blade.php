<x-menu />
<x-app-layout>
    <div class="audio-player hidden">
        <audio id="audio" class="hidden">
            <source id="audioSource" src="" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        
        <div class="bg-gravel w-64 h-20 ml-7 flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-60 h-16 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1 class="titre-combat leading-6 pb-1" >Paramètres <br> de Combat</h1>
            </div>
        </div>

        <div class="">
            <form action="{{ route('combats.update', $character) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mt-6">
                    <div class="combat-container px-2">
                        <dl>
                            @foreach ($character->combats as $combat)

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/heart.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Points de Vie</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <input type="number" name="combats[{{ $combat->id }}][health_point]" value="{{ $combat->health_point }}" class="block rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-[#2A3D80] focus:ring-2 focus:ring-inset focus:ring-[#2A3D80] w-[190px] h-[35px] pb-1 -translate-y-1 text-center border-none bg-transparent text-2xl text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/armor.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Classe d' Armure</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <input type="number" name="combats[{{ $combat->id }}][armor_class]" value="{{ $combat->armor_class }}" class="block rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-[#2A3D80] focus:ring-2 focus:ring-inset focus:ring-[#2A3D80] w-[190px] h-[35px] pb-1 -translate-y-1 text-center border-none bg-transparent text-2xl text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/eye.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Perception Passive</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <input type="number" name="combats[{{ $combat->id }}][passive_perception]" value="{{ $combat->passive_perception }}" class="block rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-[#2A3D80] focus:ring-2 focus:ring-inset focus:ring-[#2A3D80] w-[190px] h-[35px] pb-1 -translate-y-1 text-center border-none bg-transparent text-2xl text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/sprint.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Vitesse</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <input type="number" name="combats[{{ $combat->id }}][speed]" value="{{ $combat->speed }}" class="block rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-[#2A3D80] focus:ring-2 focus:ring-inset focus:ring-[#2A3D80] w-[190px] h-[35px] pb-1 -translate-y-1 text-center border-none bg-transparent text-2xl text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/chrono.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Initiative</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <input type="number" name="combats[{{ $combat->id }}][initiative]" value="{{ $combat->initiative }}" class="block rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-[#2A3D80] focus:ring-2 focus:ring-inset focus:ring-[#2A3D80] w-[190px] h-[35px] pb-1 -translate-y-1 text-center border-none bg-transparent text-2xl text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/bonus-spell.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">DD Sauvegarde de Sorts</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <input type="number" name="combats[{{ $combat->id }}][spell_save_dc]" value="{{ $combat->spell_save_dc }}" class="block rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-[#2A3D80] focus:ring-2 focus:ring-inset focus:ring-[#2A3D80] w-[190px] h-[35px] pb-1 -translate-y-1 text-center border-none bg-transparent text-2xl text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/attack-spell.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Bonus d' Attaque des Sorts</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <input type="number" name="combats[{{ $combat->id }}][spell_bonus]" value="{{ $combat->spell_bonus }}" class="block rounded-md border-0 py-1.5  shadow-sm ring-1 ring-inset ring-[#2A3D80] focus:ring-2 focus:ring-inset focus:ring-[#2A3D80] w-[190px] h-[35px] pb-1 -translate-y-1 text-center border-none bg-transparent text-2xl text-white">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/dice.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Dés de Vie</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <select name="combats[{{ $combat->id }}][dices_of_life]" class="select-style w-[230px] h-[35px] pt-1 -translate-y-1 text-left border-none bg-transparent text-2xl text-white">
                                                    <option value="6" {{ $combat->dices_of_life == 6 ? 'selected' : '' }}>6</option>
                                                    <option value="8" {{ $combat->dices_of_life == 8 ? 'selected' : '' }}>8</option>
                                                    <option value="10" {{ $combat->dices_of_life == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="12" {{ $combat->dices_of_life == 12 ? 'selected' : '' }}>12</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col mt-5 mb-6">
                                    <div class="combat-line flex flex-col items-center">
                                        <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                            <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                                <img class="w-10 h-10 " src="/images/icons/book.png" alt="">
                                            </div>
                                        </div>
                                        <div class="combat-name-bg rounded-full flex justify-center items-center">
                                            <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">Bonus d'Incantation</dt>
                                        </div>
                                        <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                            <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                                <select name="combats[{{ $combat->id }}][spellcasting_ability]" class="select-style2 w-[230px] h-[35px] pl-11 pt-1 -translate-y-1 text-left border-none bg-transparent text-2xl text-white">
                                                    <option value="Intelligence" {{ $combat->spellcasting_ability == 'Intelligence' ? 'selected' : '' }}>Intelligence</option>
                                                    <option value="Charisme" {{ $combat->spellcasting_ability == 'Charisme' ? 'selected' : '' }}>Charisme</option>
                                                    <option value="Sagesse" {{ $combat->spellcasting_ability == 'Sagesse' ? 'selected' : '' }}>Sagesse</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </dl>
                    </div>
                </div>

                <div class="flex justify-center">
                    
                    @if ($character->is_created == true)

                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Sauvegarder
                    </button>

                    @else

                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Suivant
                    </button>

                    @endif

                    @if ($character->is_created == true)
                    
                    <a href="{{ route('combats.index', $character) }}" class="btn-cancel inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Annuler
                    </a>

                    @endif
                </div>
            </form>
        </div>
    </div>
    @if($character && $character->is_created == 1)
        <nav class="navbar-char h-24 flex flex-row justify-center items-center">
            <a class="bg-blue-char" href="{{ route('characters.show', $character) }}"><img class="icons-nav p-4" src="/images/icons/avatar-cyan.png" alt=""></a>

            <a class="bg-blue-char rounded-tr-3xl" href="{{ route('stats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/braincyan.png" alt=""></a>

            <a class="" href="{{ route('combats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/swordorange.png" alt=""></a>

            <a class="bg-blue-char rounded-tl-3xl" href="{{ route('skills.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/cyanskill.png" alt=""></a>
        </nav>
    @endif
</x-app-layout>