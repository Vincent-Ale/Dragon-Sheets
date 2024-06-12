<x-app-layout>

    <div class="mt-4" x-data="{ imagePreview: '' }">

        <div class="bg-gravel w-72 h-16 mx-auto flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1>Personnage</h1>
            </div>
        </div>
        
        <div class="img-container flex flex-col items-center justify-center relative mx-auto mb-2 mt-6">
            <img x-show="imagePreview" x-bind:src="imagePreview" alt="Image Preview" class="profil-img relative z-10">
            <img class="profil-cadre absolute top-0 left-0 z-20" src="/images/cadre.png" alt="Cadre d'image de profil">
        </div>

        <form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <label for="image" class="text-3xl txt-orange">Image</label>

            <input type="file" name="image" id="image" class="flex items-center w-full p-2 mt-1 mb-6 text-xl border h-12 input-deco"
                @change="let file = $event.target.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = (e) => imagePreview = e.target.result;
                    reader.readAsDataURL(file);
                }"
            >

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="text-3xl txt-orange">Name</label>
                    <input type="text" name="name" id="name" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco" required>
                </div>

                <div>
                    <label for="race" class="text-3xl txt-orange">Race</label>
                    <input type="text" name="race" id="race" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco" required>
                </div>

                <div>
                    <label for="level" class="text-3xl txt-orange">Level</label>
                    <input type="number" name="level" id="level" oninput="CalculProfy()" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco" required>
                </div>

                <div>
                    <label for="proficiency" class="text-3xl txt-orange">Maîtrise</label>
                    <input type="number" name="proficiency" id="proficiency" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco" readonly>
                </div>

                <div>
                    <label for="class" class="text-3xl txt-orange">Class</label>
                    <input type="text" name="class" id="class" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco" required>
                </div>

                <div>
                    <label for="subclass_one" class="text-3xl txt-orange">Subclass One</label>
                    <input type="text" name="subclass_one" id="subclass_one" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco">
                </div>

                <div>
                    <label for="subclass_two" class="text-3xl txt-orange">Subclass Two</label>
                    <input type="text" name="subclass_two" id="subclass_two" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco">
                </div>

                <div>
                    <label for="alignment" class="text-3xl txt-orange">Alignment</label>
                    <input type="text" name="alignment" id="alignment" class="flex items-center w-full p-2 mt-1 text-xl border h-12 input-deco">
                </div>
            </div>

            <input name="is_created" type="hidden" value="0">

            <div class="mt-4 flex justify-center">
                <button type="submit" class="ml-4 inline-flex items-center px-2 py-2 font-winds bg-cyan border border-transparent rounded-full text-lg">
                    Créer personnage
                </button>
                <a href="{{ route('characters.index') }}" class="ml-4 inline-flex items-center px-2 py-2 font-winds bg-orange border border-transparent rounded-full text-lg">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
