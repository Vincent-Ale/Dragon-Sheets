<div x-data="{ openmenu: false }">
    
    <div class="menu flex fixed top-0 right-0 z-20"
            x-show="openmenu"
            x-on:click.away="openmenu = false"
            x-cloak
            x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition transform ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            >

        <div class="lien-menu flex flex-col justify-center items-center text-3xl">
            <a href="{{ route('characters.index') }}" class="block px-4 py-2 mt-3 mb-6">Personnages</a>
            <a href="{{ route('profile.show') }}" class="block px-4 py-2 mb-6">Mon Compte</a>
            <a href="{{ route('settings.index') }}" class="block px-4 py-2 mb-6">Paramètres</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 mb-6">Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <p x-on:click="openmenu = false" class="pb-2 mb-3" >Fermer</p>
        </div>
    </div>

    <div class="btn-menu fixed top-0 right-0 flex flex-col items-center p-1 z-10" x-on:click="openmenu = true">
        <p class="text-xl" >MENU</p>
        <img class="dragon-logo" src="/images/dragonlogo.png" alt="">
    </div>

</div>