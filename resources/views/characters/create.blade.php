<x-app-layout>
    <div class="audio-player hidden">
        <audio id="audio" class="hidden">
            <source id="audioSource" src="" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <input type="range" id="progressBar" min="0" max="100" hidden>
    </div>

    <div class="mt-4" x-data="{ imagePreview: '' }">

        <div class="bg-gravel w-72 h-16 mx-auto flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1>Personnage</h1>
            </div>
        </div>
        
        <form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mt-4 shadow overflow-hidden sm:rounded-lg">

                <!-- Image de profil -->
                <div class="img-container flex flex-col items-center justify-center relative mx-auto mt-2 mb-2">
                    <img id="preview" src="" alt="" class="profil-img relative">
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
                    <div class="px-4 py-2 w-full">
                        <label for="name" class="text-2xl txt-orange">Nom</label>
                        <input type="text" name="name" id="name" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12" required>
                    </div>
                    <div class="px-4 py-2 w-full">
                        <label for="race" class="text-2xl txt-orange">Race</label>
                        <input type="text" name="race" id="race" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12" required>
                    </div>
                    <div class="flex flex-row w-full">
                        <div class="w-1/2 px-4 py-2">
                            <label for="level" class="text-2xl txt-orange">Niveau</label>
                            <input type="number" name="level" id="level" oninput="CalculProfy()" class="w-full settings-border2 rounded-lg flex flex-row items-center p-2 text-white text-3xl border h-12" required>
                        </div>
                        <div class="w-1/2 px-4 py-2">
                            <label for="proficiency" class="text-2xl txt-orange">Maîtrise</label>
                            <input type="number" name="proficiency" id="proficiency" class="w-full settings-border2 rounded-lg flex flex-row items-center p-2 text-white text-3xl border h-12" readonly>
                        </div>
                    </div>
                    <div class="px-4 py-2 w-full">
                        <label for="class" class="text-2xl txt-orange">Classe</label>
                        <input type="text" name="class" id="class" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12" required>
                    </div>
                    <div class="px-4 py-2 w-full">
                        <label for="subclass_one" class="text-2xl txt-orange">Première Sous-Classe</label>
                        <input type="text" name="subclass_one" id="subclass_one" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12">
                    </div>
                    <div class="px-4 py-2 w-full">
                        <label for="subclass_two" class="text-2xl txt-orange">Deuxième Sous-Classe</label>
                        <input type="text" name="subclass_two" id="subclass_two" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12">
                    </div>
                    <div class="px-4 py-2 w-full">
                        <label for="alignment" class="text-2xl txt-orange">Alignement</label>
                        <input type="text" name="alignment" id="alignment" class="w-full settings-border rounded-lg flex flex-row items-center p-2 text-xl border h-12">
                    </div>
                </div>
                <input name="is_created" type="hidden" value="0">
                <div class="mt-6 flex flex-col justify-center items-center">
                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 mb-4 border border-transparent rounded-full">
                        Créer personnage
                    </button>
                    <a href="{{ route('characters.index') }}" class="btn-cancel inline-flex items-center text-2xl px-4 py-2 mb-6 border border-transparent rounded-full">
                        Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
