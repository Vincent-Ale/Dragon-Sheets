<x-menu />

@if(auth()->user()->settings_virtual_dices == 1)
<x-virtual-dices />     
@endif

<x-app-layout>
    <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
        <!-- En-tête du personnage -->
        <div class="bg-gravel w-72 h-16 mx-4 flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1>Personnage</h1>
            </div>
        </div>
        
        <!-- Détails du personnage -->
        <div class="mt-4 shadow overflow-hidden sm:rounded-lg">
                <!-- Image de profil -->
                <div class="img-container flex flex-col items-center justify-center relative mx-auto mt-2 mb-2">
                    <img class="profil-img relative" 
                         src="{{ asset('storage/images/' . basename($character->image_path)) }}" 
                         alt="Image de profil de {{ $character->name }}">
                    <img class="profil-cadre absolute top-0 left-0" src="/images/cadre.png" alt="Cadre stylisé autour de l'image">
                </div>

                <!-- Attributs du personnage -->

                    <div class="settings-text rounded-lg mx-2 mt-6 pb-3">
                        <!-- Nom -->
                        <div class="px-4 py-2">
                            <dt class="text-2xl">Nom</dt>
                            <dd class="settings-border rounded-lg flex flex-row items-center p-2  text-xl border h-12">{{ $character->name }}</dd>
                        </div>
                        <!-- Race -->
                        <div class="px-4 py-2">
                            <dt class="text-2xl">Race</dt>
                            <dd class="settings-border rounded-lg flex flex-row items-center p-2  text-xl border h-12">{{ $character->race }}</dd>
                        </div>
                        <!-- Niveau et Maîtrise -->
                        <div class="flex flex-row">
                            <div class="w-1/2 px-4 py-2">
                                <dt class="text-2xl">Niveau</dt>
                                <dd class="settings-border2 rounded-lg flex flex-row items-center p-2 text-white text-3xl border h-12">{{ $character->level }}</dd>
                            </div>
                            <div class="w-1/2 px-4 py-2">
                                <dt class="text-2xl">Maîtrise</dt>
                                <dd class="settings-border2 rounded-lg flex flex-row items-center p-2 text-white text-3xl border h-12">{{ $character->proficiency }}</dd>
                            </div>
                        </div>
                        <!-- Classe -->
                        <div class="px-4 py-2">
                            <dt class="text-2xl">Classe</dt>
                            <dd class="settings-border rounded-lg flex flex-row items-center p-2  text-xl border h-12">{{ $character->class }}</dd>
                        </div>
                        <!-- Sous-classes et Alignement -->
                        <div class="px-4 py-2">
                            <dt class="text-2xl">Première Sous-Classe</dt>
                            <dd class="settings-border rounded-lg flex flex-row items-center p-2  text-xl border h-12">{{ $character->subclass_one }}</dd>
                        </div>
                        <div class="px-4 py-2">
                            <dt class="text-2xl">Deuxième Sous-Classe</dt>
                            <dd class="settings-border rounded-lg flex flex-row items-center p-2  text-xl border h-12">{{ $character->subclass_two }}</dd>
                        </div>
                        <div class="px-4 py-2">
                            <dt class="text-2xl">Alignement</dt>
                            <dd class="settings-border rounded-lg flex flex-row items-center p-2  text-xl border h-12">{{ $character->alignment }}</dd>
                        </div>
                    </div>

                    

                    <!-- Modales et Actions -->

                    <div class="flex flex-row justify-center gap-x-4 mt-6">


                        {{-- Modale de Lore --}}

                        <div x-data="{ showModal: false }" x-init="$watch('showModal', value => document.body.classList.toggle('overflow-hidden', value))">
                           
                            <div x-on:click="showModal = true" class="btn-note-lore flex flex-row items-center px-4 py-2 rounded-full">
                                <img class="lore-notepad w-10 h-10" src="/images/loreC.png" alt="icone de plume pour afficher le lore personnage">
                                <p class="btn-text-color pl-2 text-2xl">Lore</p>
                            </div>

                            <!-- Fond de la modale -->

                            <div x-show="showModal" class="fixed inset-0 overflow-y-auto " style="display: none;">

                                <!-- Overlay de la modale -->
                                
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-black opacity-80"></div>
                                </div>
                        
                                <!-- Contenu de la modale -->
                                <div x-on:click.away="showModal = false" class="absolute modal" role="dialog" aria-modal="true" x-show="showModal" style="display: none;">

                                    <div class="mt-12 mb-6 text-center">

                                        <h3 class="text-xl mt-4 mb-4 font-medium txt-lore-notepad">
                                            Lore
                                        </h3>


                                        <!-- Formulaire de modification du notepad -->

                                        <form action="{{ route('characters.updateLore', $character) }}" method="POST">

                                            @csrf
                                            @method('PUT')

                                            <textarea name="lore" class="w-64 h-4/6 ml-2 mb-2 p-2 text-lg txt-lore-notepad border-none bg-transparent" rows="10">{{ $character->lore }}</textarea>

                                            <div class="flex justify-center space-x-4 mt-4">

                                                <button type="button" x-on:click="showModal = false" class="rounded-full border border-transparent shadow-sm px-4 py-2 font-winds txt-button-lore-notepad bg-lore-notepad">
                                                    Fermer
                                                </button>
                                                <button type="submit" class="rounded-full border border-transparent shadow-sm px-4 py-2 font-winds txt-button-lore-notepad bg-lore-notepad ">
                                                    Enregistrer
                                                </button>
                                                
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>


                        {{-- Modale de Notepad --}}

                        <div x-data="{ showModal: false }" x-init="$watch('showModal', value => document.body.classList.toggle('overflow-hidden', value))">

                            <div x-on:click="showModal = true" class="btn-note-lore btn-note-lore flex flex-row items-center px-4 py-2 rounded-full">
                                <img class="lore-notepad w-10 h-10" src="/images/editC.png" alt="icone de plume pour afficher les notes du personnage">
                                <p class="btn-text-color pl-2 text-2xl">Notepad</p>
                            </div>

                            <!-- Fond de la modale -->

                            <div x-show="showModal" class="fixed inset-0 overflow-y-auto" style="display: none;">


                                <!-- Overlay de la modale -->

                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-black opacity-80"></div>
                                </div>
                        
                                <!-- Contenu de la modale -->
                                
                                <div x-on:click.away="showModal = false" class="absolute modal" role="dialog" aria-modal="true" x-show="showModal" style="display: none;">

                                    <div class="mt-12 mb-6 text-center">

                                        <h3 class="text-xl mt-4 mb-4 font-medium txt-lore-notepad">
                                            Notepad
                                        </h3>


                                        <!-- Formulaire de modification du notepad -->

                                        <form action="{{ route('characters.updateNotepad', $character) }}" method="POST">

                                            @csrf
                                            @method('PUT')

                                            <textarea name="notepad" class="w-64 h-4/6 p-2 text-lg txt-lore-notepad border-none bg-transparent" rows="10">{{ $character->notepad }}</textarea>

                                            <div class="flex justify-center space-x-4 mt-4">

                                                <button type="button" x-on:click="showModal = false" class="rounded-full border border-transparent shadow-sm px-4 py-2 font-winds txt-button-lore-notepad bg-lore-notepad">
                                                    Fermer
                                                </button>
                                                <button type="submit" class="rounded-full border border-transparent shadow-sm px-4 py-2 font-winds txt-button-lore-notepad bg-lore-notepad ">
                                                    Enregistrer
                                                </button>
                                                
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
        </div>
    </div>
    
    {{-- Modifier le personnage --}}

    <div class="flex justify-center mb-6 mt-4">
        <a href="{{ route('characters.edit', $character) }}" class="btn-modif inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
            Modifier
        </a>
    </div>

    <!-- Navigation du personnage -->

    @if($character && $character->is_created == 1)
        <nav class="navbar-char h-24 flex flex-row justify-center items-center">
            <a href="{{ route('characters.show', $character) }}"><img class="icons-nav p-4" src="/images/icons/avatar-orange.png" alt="Icône Avatar"></a>
            <a class="bg-blue-char rounded-tl-3xl" href="{{ route('stats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/braincyan.png" alt="Icône Statistiques"></a>
            <a class="bg-blue-char" href="{{ route('combats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/swordcyan.png" alt="Icône Combat"></a>
            <a class="bg-blue-char" href="{{ route('skills.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/cyanskill.png" alt="Icône Compétences"></a>
        </nav>
    @endif

    
</x-app-layout>
