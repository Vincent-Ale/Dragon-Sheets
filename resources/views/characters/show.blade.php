<x-navbar />
<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
        <div class="bg-gravel w-72 h-16 ml-2.5 flex items-center justify-center rounded-lg">
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
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Nom</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->name }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Race</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->race }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Level</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->level }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Maîtrise</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->proficiency }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Class</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->class }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Subclass One</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->subclass_one }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Subclass Two</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->subclass_two }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Alignment</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->alignment }}</dd>
                    </div>
                    <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-3xl font-medium txt-orange">Notepad</dt>
                        <dd class="flex flex-row items-center pl-1 mt-1 text-xl text-gray-900 sm:mt-0 sm:col-span-2 border h-10 input-deco">{{ $character->notepad }}</dd>
                    </div>
                    <div class="flex flex-row justify-center gap-x-8">
                        {{-- Lore modal section --}}

                        <div x-data="{ showModal: false }" x-init="$watch('showModal', value => document.body.classList.toggle('overflow-hidden', value))">
                            <button x-on:click="showModal = true" class="w-16 h-auto inline-flex items-center px-4 py-2 bg-cyan border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                                <img src="/images/loreblue.png" alt="icone de plume pour afficher le lore personnage">
                            </button>

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
                                                <h3 class="text-xl mt-4 font-medium text-gray-900">Character Lore</h3>
                                                <div class="mt-2 max-h-96 overflow-y-auto px-4">
                                                    <div class="absolute w-60 h-16 rounded-md bg-gradient-to-t from-transparent to-[#dba368] pointer-events-none"></div>
                                                    <div class="text-lg text-gray-500">{{ $character->lore }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <button x-on:click="showModal = false" type="button" class="absolute bottom-[10%] left-1/2 transform -translate-x-1/2 w-20 rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('characters.edit', $character) }}" class="w-24 h-12 inline-flex items-center px-4 py-2 bg-cyan border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                                Modifier
                            </a>
                        </div>

                        {{-- Notepad modal section --}}

                        <div x-data="{ showModal: false }" x-init="$watch('showModal', value => document.body.classList.toggle('overflow-hidden', value))">
                            <button x-on:click="showModal = true" class="w-16 h-auto inline-flex items-center px-4 py-2 bg-cyan border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                                <img src="/images/edit.png" alt="icone de plume pour afficher les notes du personnage">
                            </button>

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
                                        <button x-on:click="showModal = false" type="button" class="absolute bottom-[10%] left-1/2 transform -translate-x-1/2  w-20 rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
</x-app-layout>
