<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        

        <div class="bg-gravel w-72 h-16 mx-4 flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1>Personnage</h1>
            </div>
        </div>

        <div class="mt-4 shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('characters.update', $character) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="text-3xl txt-orange">Name</label>
                        <input type="text" name="name" id="name" value="{{ $character->name }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco" required>
                    </div>

                    <div>
                        <label for="race" class="text-3xl txt-orange">Race</label>
                        <input type="text" name="race" id="race" value="{{ $character->race }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco" required>
                    </div>
                    <div class="flex flex-row">
                        <div>
                            <label for="level" class="text-3xl txt-orange">Level</label>
                            <input type="number" name="level" id="level" oninput="CalculProfy()" value="{{ $character->level }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco" required>
                        </div>

                        <div>
                            <label for="proficiency" class="text-3xl txt-orange">Maîtrise</label>
                            <input type="number" name="proficiency" id="proficiency" value="{{ $character->proficiency }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco" readonly>
                        </div>
                    </div>
                    <div>
                        <label for="class" class="text-3xl txt-orange">Class</label>
                        <input type="text" name="class" id="class" value="{{ $character->class }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco" required>
                    </div>

                    <div>
                        <label for="subclass_one" class="text-3xl txt-orange">Subclass One</label>
                        <input type="text" name="subclass_one" id="subclass_one" value="{{ $character->subclass_one }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">
                    </div>

                    <div>
                        <label for="subclass_two" class="text-3xl txt-orange">Subclass Two</label>
                        <input type="text" name="subclass_two" id="subclass_two" value="{{ $character->subclass_two }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">
                    </div>

                    <div>
                        <label for="alignment" class="text-3xl txt-orange">Alignment</label>
                        <input type="text" name="alignment" id="alignment" value="{{ $character->alignment }}" class="flex flex-row items-center p-2 mt-1 text-xl border h-12 input-deco">
                    </div>
                </div>
                <div class="flex flex-row justify-center gap-x-4 pt-2 pb-2">
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
                                            <div class="mt-2 pt-8 px-4 h-4/5">
                                                <label for="lore" class="text-xl font-medium text-gray-900">Character Lore</label>
                                                <textarea name="lore" id="lore" rows="3" class="w-60 h-[95%] text-lg txt-darkBlue">{{ $character->lore }}</textarea>
                                            </div>
                                    <button x-on:click="showModal = false" type="button" class="absolute bottom-[8%] left-1/2 transform -translate-x-1/2 w-20 rounded-md border border-transparent shadow-sm px-4 py-2 txt-darkBlue bg-cyan">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
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
                                        
                                        <!-- Modal Content -->
                                <div x-on:click.away="showModal = false" class="absolute modal" role="dialog" aria-modal="true" x-show="showModal" style="display: none;">
                                    <div class="mt-2 pt-8 px-4 h-4/5">
                                        <label for="lore" class="text-xl font-medium text-gray-900">Notepad</label>
                                        <textarea name="lore" id="lore" rows="3" class="w-60 h-[95%] text-lg txt-darkBlue">{{ $character->notepad }}</textarea>
                                    </div>
                            <button x-on:click="showModal = false" type="button" class="absolute bottom-[8%] left-1/2 transform -translate-x-1/2 w-20 rounded-md border border-transparent shadow-sm px-4 py-2 txt-darkBlue bg-cyan">
                                Close
                            </button>
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
