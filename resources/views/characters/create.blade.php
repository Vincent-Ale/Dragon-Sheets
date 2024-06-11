<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
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

        <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg" x-data="{ imagePreview: '' }">
            <div class="img-container flex flex-col items-center justify-center relative mb-2">
                <img x-show="imagePreview" x-bind:src="imagePreview" alt="Image Preview" class="profil-img relative z-10">
                <img class="profil-cadre absolute top-0 left-0 z-20" src="/images/cadre.png" alt="Cadre d'image de profil">
            </div>

            <form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image:</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    @change="let file = $event.target.files[0];
                             if (file) {
                                 let reader = new FileReader();
                                 reader.onload = (e) => imagePreview = e.target.result;
                                 reader.readAsDataURL(file);
                             }">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="race" class="block text-sm font-medium text-gray-700">Race</label>
                        <input type="text" name="race" id="race" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <input type="number" name="level" id="level" oninput="CalculProfy()" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="proficiency" class="block text-sm font-medium text-gray-700">Maîtrise</label>
                        <input type="number" name="proficiency" id="proficiency" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" readonly>
                    </div>

                    <div>
                        <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                        <input type="text" name="class" id="class" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="subclass_one" class="block text-sm font-medium text-gray-700">Subclass One</label>
                        <input type="text" name="subclass_one" id="subclass_one" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <div>
                        <label for="subclass_two" class="block text-sm font-medium text-gray-700">Subclass Two</label>
                        <input type="text" name="subclass_two" id="subclass_two" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <div>
                        <label for="alignment" class="block text-sm font-medium text-gray-700">Alignment</label>
                        <input type="text" name="alignment" id="alignment" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <div>
                        <label for="lore" class="block text-sm font-medium text-gray-700">Lore</label>
                        <textarea name="lore" id="lore" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                    </div>

                    <div>
                        <label for="notepad" class="block text-sm font-medium text-gray-700">Notepad</label>
                        <textarea name="notepad" id="notepad" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                    </div>
                </div>

                <input name="is_created" type="hidden" value="0">

                <div class="mt-4 flex space-x-2">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 disabled:opacity-25 transition">
                        Create Character
                    </button>
                    <a href="{{ route('characters.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
