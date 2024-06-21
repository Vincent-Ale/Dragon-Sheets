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

        <div class="mt-6 ">
            <div class="combat-container px-2 ">
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
                                        <dd class="text-2xl text-white">{{ $combat->health_point }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mb-6">
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
                                        <dd class="text-2xl text-white">{{ $combat->armor_class }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col mb-6">
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
                                        <dd class="text-2xl text-white">{{ $combat->passive_perception }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mb-6">
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
                                        <dd class="text-2xl text-white">{{ $combat->speed }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mb-6">
                            <div class="combat-line flex flex-col items-center">
                                <div class="icon-combat-bg rounded-t-full flex justify-center items-end">
                                    <div class="icon-combat rounded-t-full flex justify-center items-end pb-1">
                                        <img class="w-10 h-10 " src="/images/icons/chrono.png" alt="">
                                    </div>
                                </div>
                                <div class="combat-name-bg rounded-full flex justify-center items-center">
                                    <dt class="combat-name rounded-full text-2xl text-center flex justify-center items-center pt-1">initiative</dt>
                                </div>
                                <div class="combat-value-bg flex justify-center items-start rounded-b-md">
                                    <div class="combat-value flex justify-center items-start pt-1 rounded-b-md">
                                        <dd class="text-2xl text-white">{{ $combat->initiative }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col mb-6">
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
                                        <dd class="text-2xl text-white">{{ $combat->spell_save_dc }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col mb-6">
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
                                        <dd class="text-2xl text-white">{{ $combat->spell_bonus }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mb-6">
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
                                        <dd class="text-2xl text-white">{{ $combat->dices_of_life }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col mb-6">
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
                                        <dd class="text-2xl text-white">{{ $combat->spellcasting_ability }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </dl>
            </div>
        </div>

        <div class="flex justify-center">
            <a href="{{ route('combats.edit', $character) }}" class="btn-modif inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                Modifier
            </a>
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