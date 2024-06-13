<x-menu />

<x-app-layout>
    
    <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
        

        <div class="bg-gravel w-72 h-16 mx-4 flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1>Personnage</h1>
            </div>
        </div>

        <form action="{{ route('characters.update', $character) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mt-4 shadow overflow-hidden sm:rounded-lg">
                <!-- Image de profil -->
                <div class="img-container flex flex-col items-center justify-center relative mx-auto mt-2 mb-2">
                    <img id="preview" src="{{ asset('storage/images/' . basename($character->image_path)) }}" alt="Image de profil" class="profil-img relative">
                    <img class="profil-cadre absolute top-0 left-0" src="/images/cadre.png" alt="Cadre stylisé autour de l'image">
                </div>

                <!-- Masquez l'input de type file -->
                <input type="file" name="image" id="image" class="hidden" onchange="previewImage(event)">

                <!-- Ajoutez un label pour l'input de type file avec une icône -->
                <label for="image" class="settings-text flex flex-row items-center justify-center mx-12 mt-6 rounded-full">
                    <img class="h-12 w-12 mr-2" src="/images/icons/upload.png" alt=""> <!-- Remplacez ceci par l'icône de votre choix -->
                    <p class="cyan-text text-xl">Choisir une image</p>
                </label>

                <div class="settings-text flex flex-col items-center rounded-lg mx-2 mt-6 pt-2 pb-3">
                    <!-- Nom -->
                    <div class="px-4 py-2 w-full">
                        <label for="name" class="text-2xl">Nom</label>
                        <input type="text" name="name" id="name" value="{{ $character->name }}" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12" required>
                    </div>
                    <!-- Race -->
                    <div class="px-4 py-2 w-full">
                        <label for="race" class="text-2xl">Race</label>
                        <input type="text" name="race" id="race" value="{{ $character->race }}" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12" required>
                    </div>
                    <!-- Niveau et Maîtrise -->
                    <div class="flex flex-row w-full">
                        <div class="px-4 py-2 ">
                            <label for="level" class="text-2xl">Niveau</label>
                            <input type="number" name="level" id="level" oninput="CalculProfy()" value="{{ $character->level }}" class="w-full settings-border2 rounded-lg flex flex-row items-center p-2 text-white text-3xl border h-12" required>
                        </div>
                        <div class="px-4 py-2 ">
                            <label for="proficiency" class="text-2xl">Maîtrise</label>
                            <input type="number" name="proficiency" id="proficiency" value="{{ $character->proficiency }}" class="w-full settings-border2 rounded-lg flex flex-row items-center p-2 text-white text-3xl border h-12" readonly>
                        </div>
                    </div>
                    <!-- Classe -->
                    <div class="px-4 py-2 w-full">
                        <label for="class" class="text-2xl">Classe</label>
                        <input type="text" name="class" id="class" value="{{ $character->class }}" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12" required>
                    </div>
                    <!-- Sous-classes et Alignement -->
                    <div class="px-4 py-2 w-full">
                        <label for="subclass_one" class="text-2xl">Première Sous-classe</label>
                        <input type="text" name="subclass_one" id="subclass_one" value="{{ $character->subclass_one }}" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12">
                    </div>
                    <div class="px-4 py-2 w-full">
                        <label for="subclass_two" class="text-2xl">Deuxième Sous-Classe</label>
                        <input type="text" name="subclass_two" id="subclass_two" value="{{ $character->subclass_two }}" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12">
                    </div>
                    <div class="px-4 py-2 w-full">
                        <label for="alignment" class="text-2xl">Alignment</label>
                        <input type="text" name="alignment" id="alignment" value="{{ $character->alignment }}" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12">
                    </div>
                </div>

                <div class="mt-6 flex justify-center">
                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Sauvegarder
                    </button>
                    <a href="{{ route('characters.show', $character) }}" class="btn-cancel inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Annuler
                    </a>
                </div>
            </div>
        </form>
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
