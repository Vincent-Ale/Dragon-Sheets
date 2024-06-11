<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
        <div class="bg-gravel w-72 h-16 mx-4 flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1>Personnage</h1>
            </div>
        </div>
        
        <div class="mt-4 shadow overflow-hidden sm:rounded-lg">
            <div>
                <div class="img-container flex flex-col items-center justify-center relative mx-auto mt-2 mb-2">
                    <img class="profil-img relative" 
                         src="{{ asset('storage/images/' . basename($character->image_path)) }}" 
                         alt="Image de profil de {{ $character->name }}">
                    <img class="profil-cadre absolute top-0 left-0" src="/images/cadre.png" alt="Cadre stylisé autour de l'image">
                </div>
                <dl>
                    <!-- Détails du personnage -->
                    <div class=" px-4 py-2">
                        <dt class="text-3xl txt-orange">Nom</dt>
                        <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->name }}</dd>
                    </div>
                    <div class=" px-4 py-2">
                        <dt class="text-3xl txt-orange">Race</dt>
                        <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->race }}</dd>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/2 px-4 py-2">
                            <dt class="text-3xl txt-orange">Level</dt>
                            <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->level }}</dd>
                        </div>
                        <div class="w-1/2 px-4 py-2">
                            <dt class="text-3xl txt-orange">Maîtrise</dt>
                            <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->proficiency }}</dd>
                        </div>
                    </div>
                    <div class=" px-4 py-2">
                        <dt class="text-3xl txt-orange">Class</dt>
                        <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->class }}</dd>
                    </div>
                    <div class=" px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                        <dt class="text-3xl txt-orange">Subclass One</dt>
                        <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->subclass_one }}</dd>
                    </div>
                    <div class=" px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                        <dt class="text-3xl txt-orange">Subclass Two</dt>
                        <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->subclass_two }}</dd>
                    </div>
                    <div class=" px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                        <dt class="text-3xl txt-orange">Alignment</dt>
                        <dd class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">{{ $character->alignment }}</dd>
                    </div>
                    <div class="flex flex-row justify-center gap-x-4 pt-2 pb-2">
                        {{-- Lore modal section --}}

                        <div x-data="{ showModal: false }" x-init="$watch('showModal', value => document.body.classList.toggle('overflow-hidden', value))">
                            <div x-on:click="showModal = true" class="ml-4 inline-flex items-center px-2 py-2 bg-cyan border border-transparent rounded-md text-lg">
                                <img class="lore-notepad" src="/images/loreblue.png" alt="icone de plume pour afficher le lore personnage">
                                <p class="txt-darkBlue">Lore</p>
                            </div>

                            <!-- Modal Background -->
                            <div x-show="showModal" class="fixed inset-0 overflow-y-auto " style="display: none;">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <!-- Modal Overlay -->
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                            
                                    <!-- Modal Content -->
                                    <div x-on:click.away="showModal = false" class="absolute modal" role="dialog" aria-modal="true" x-show="showModal" style="display: none;">
                                        <div class=" px-4 pt-10 pb-4">
                                            
                                            <div class="mt-3 mb-6 text-center">
                                                <h3 class="text-xl mt-4 font-medium text-gray-900">Character Lore</h3>
                                                <div class="mt-2 max-h-96 overflow-y-auto px-4">
                                                    <div class="absolute w-60 h-16 rounded-md bg-gradient-to-t from-transparent to-[#dba368] pointer-events-none"></div>
                                                    <div class="text-lg text-gray-500">{{ $character->lore }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <button x-on:click="showModal = false" type="button" class="absolute bottom-[10%] left-1/2 transform -translate-x-1/2 w-20 rounded-md border border-transparent shadow-sm px-4 py-2 txt-darkBlue bg-cyan">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('characters.edit', $character) }}" class="txt-darkBlue flex justify-center w-28 h-12 items-center px-2 py-2 bg-cyan border border-transparent rounded-md">
                                Modifier
                            </a>
                        </div>

                        {{-- Notepad modal section --}}

                        <div x-data="{ showModal: false }" x-init="$watch('showModal', value => document.body.classList.toggle('overflow-hidden', value))">
                            <div x-on:click="showModal = true" class="mr-4 inline-flex items-center px-2 py-2 bg-cyan border border-transparent rounded-md">
                                <img class="lore-notepad pr-2" src="/images/edit.png" alt="icone de plume pour afficher les notes du personnage">
                                <p class="txt-darkBlue">Notepad</p>
                            </div>

                            <!-- Modal Background -->
                            <div x-show="showModal" class="fixed inset-0 overflow-y-auto" style="display: none;">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <!-- Modal Overlay -->
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                            
                                    <!-- Modal Content -->
                                    <div x-on:click.away="showModal = false" class="absolute modal" role="dialog" aria-modal="true" x-show="showModal" style="display: none;">
                                        <div class=" px-4 pt-10 pb-4">
                                            
                                            <div class="mt-3 mb-6 text-center">
                                                <h3 class="text-xl mt-4 font-medium text-gray-900">Notepad</h3>
                                                <div class="mt-2 max-h-96 overflow-y-auto px-4 relative">
                                                    <div class="absolute w-60 h-16 rounded-md bg-gradient-to-t from-transparent to-[#dba368] pointer-events-none"></div>
                                                    <div class="text-lg text-gray-500">{{ $character->notepad }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <button x-on:click="showModal = false" type="button" class="absolute bottom-[10%] left-1/2 transform -translate-x-1/2  w-20 rounded-md border border-transparent shadow-sm px-4 py-2 txt-darkBlue bg-cyan">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                   

                    
                </dl>
            </div>
        </div>
    </div>
    @if($character && $character->is_created == 1)
        <nav class="navbar-char h-24 flex flex-row justify-center items-center">
            <a class="" href="{{ route('characters.show', $character) }}"><img class="icons-nav p-4" src="/images/icons/avatar-orange.png" alt=""></a>

            <a class="bg-blue-char rounded-tl-3xl" href="{{ route('stats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/braincyan.png" alt=""></a>

            <a class="bg-blue-char" href="{{ route('combats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/swordcyan.png" alt=""></a>

            <a class="bg-blue-char" href="{{ route('skills.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/cyanskill.png" alt=""></a>
        </nav>
    @endif
</x-app-layout>
