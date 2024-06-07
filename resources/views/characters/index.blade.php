<x-menu />
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

    <div class="bg-gravel w-72 h-16 ml-2.5 mt-4 flex items-center justify-center rounded-lg">
        <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
            <h1>Personnages</h1>
        </div>
    </div>

    {{-- <a href="{{ route('characters.create') }}">Create a new character</a> --}}
    <div class="effect-top"></div>
    <div class="effect-scroll">
        <ul class="list-scroll relative overflow-y-scroll pt-4 pb-4">
        @foreach ($characters as $character )
            <div  x-data="{open: false}">
                <div class="fixed inset-0 bg-black backdrop-blur-md bg-opacity-30"
                    x-show="open"
                    x-cloak
                    x-transition
                ></div>
                <div class="modal absolute z-50"
                    x-show="open"
                    x-on:click.away="open = false"
                    x-cloak
                    x-transition:enter="transition transform ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition transform ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    style="position: fixed; top: 45%; left: 50%; transform: translate(-50%, -50%);"
                >
                    <button class="absolute top-0 right-8 mt-2 text-l" x-on:click="open = false">Fermer <span class="text-2xl" >X</span></button>
                    <div class="profil-char flex flex-col items-center mt-16">
                        <div class="img-container flex flex-col items-center justify-center relative mb-2">
                            <img class="profil-img relative z-10" src="{{ $character->image_path }}" alt="">
                            <img class="profil-cadre absolute top-0 left-0 z-20" src="/images/cadre.png" alt="">
                        </div>
                        <p class="color-text text-2xl">Nom</p>
                        <span class="bdd-text text-xl mb-1">{{ $character->name }}</span>
                        <p class="color-text text-2xl">Race</p>
                        <span class="bdd-text text-xl mb-1">{{ $character->race }}</span>
                        <p class="color-text text-2xl">Classe</p>
                        <span class="bdd-text text-xl mb-1">{{ $character->class }}</span>
                        @if($character->is_created)
                            <a class="btn-voir mt-2 text-4xl px-4 rounded-full" href="{{ route('characters.show', $character) }}">Voir</a>
                        @else
                            <a class="btn-voir mt-2 text-xl px-2 mx-14 rounded-full text-wrap text-center" href="{{ route('characters.edit', $character) }}">Continuer la création</a>
                        @endif
                        <form action="{{ route('characters.destroy', $character) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn-delete mt-6 text-2xl px-4 py-1 rounded-full">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
        
                <li class="char-list-bar text-center mx-auto flex flex-col justify-center text-xl" x-on:click="open = true">
                    {{ $character->name }}
                </li>
            </div>
        @endforeach
        </ul>
    </div>
    <div class="effect-bottom" ></div>

    <div class="barcreate w-full flex flex-col items-center absolute bottom-0 left-1/2 -translate-x-1/2 z-10">
        <a href="{{ route('characters.create') }}" class="">
        <img class="w-20 h-20 translate-y-10" src="/images/icons/addrectorange.png" alt=""></a>
        <div class="footer-create-box h-20 w-full flex flex-col justify-end">
            <p class="footer-create text-center text-2xl pb-2" >Créer un Personnage</p>
        </div>
    </div>

</x-app-layout>
