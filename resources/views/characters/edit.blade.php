<x-menu />
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

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Character
        </h2>

        <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('characters.update', $character) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ $character->name }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="race" class="block text-sm font-medium text-gray-700">Race</label>
                        <input type="text" name="race" id="race" value="{{ $character->race }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <input type="number" name="level" id="level" oninput="CalculProfy()" value="{{ $character->level }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="proficiency" class="block text-sm font-medium text-gray-700">Maîtrise</label>
                        <input type="number" name="proficiency" id="proficiency" value="{{ $character->proficiency }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" readonly>
                    </div>

                    <div>
                        <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                        <input type="text" name="class" id="class" value="{{ $character->class }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>

                    <div>
                        <label for="subclass_one" class="block text-sm font-medium text-gray-700">Subclass One</label>
                        <input type="text" name="subclass_one" id="subclass_one" value="{{ $character->subclass_one }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <div>
                        <label for="subclass_two" class="block text-sm font-medium text-gray-700">Subclass Two</label>
                        <input type="text" name="subclass_two" id="subclass_two" value="{{ $character->subclass_two }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <div>
                        <label for="alignment" class="block text-sm font-medium text-gray-700">Alignment</label>
                        <input type="text" name="alignment" id="alignment" value="{{ $character->alignment }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <div>
                        <label for="lore" class="block text-sm font-medium text-gray-700">Lore</label>
                        <textarea name="lore" id="lore" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ $character->lore }}</textarea>
                    </div>

                    <div>
                        <label for="notepad" class="block text-sm font-medium text-gray-700">Notepad</label>
                        <textarea name="notepad" id="notepad" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ $character->notepad }}</textarea>
                    </div>
                </div>

                <div class="mt-4 flex space-x-2">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                        Update Character
                    </button>
                    <a href="{{ route('characters.show', $character) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                        Cancel
                    </a>
                </div>
            </form>
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
