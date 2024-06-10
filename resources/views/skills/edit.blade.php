<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Skills for {{ $character->name }}
        </h2>

        <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('skills.update', $character) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Skills</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        @foreach ($character->skills as $skill)
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Skill Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="skills[{{ $skill->id }}][name]" value="{{ $skill->name }}" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Value</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="number" name="skills[{{ $skill->id }}][value]" value="{{ $skill->value }}" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Proficiency</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="checkbox" name="skills[{{ $skill->id }}][proficiency]" {{ $skill->proficiency ? 'checked' : '' }} class="mt-1 block">
                                </dd>
                            </div>
                            <div class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Expertise</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <input type="checkbox" name="skills[{{ $skill->id }}][expertise]" {{ $skill->expertise ? 'checked' : '' }} class="mt-1 block">
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

                <div class="mt-4 flex space-x-2">
                    
                    @if ($character->is_created == true)

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                        Sauvegarder
                    </button>

                    @else

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                        Terminer la création
                    </button>

                    @endif

                    @if ($character->is_created == true)
                    
                    <a href="{{ route('skills.index', $character) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                        Annuler
                    </a>

                    @endif
                </div>
            </form>
        </div>
    </div>
    @if($character && $character->is_created == 1)
        <nav class="navbar-char h-24 flex flex-row justify-center items-center">
            <a class="bg-blue-char " href="{{ route('characters.show', auth()->user()->character) }}"><img class="icons-nav p-4" src="/images/icons/avatar-cyan.png" alt=""></a>

            <a class="bg-blue-char" href="{{ route('stats.index', auth()->user()->character) }}"><img class="icons-nav p-4" src="/images/icons/braincyan.png" alt=""></a>

            <a class="bg-blue-char rounded-tr-3xl" href="{{ route('combats.index', auth()->user()->character) }}"><img class="icons-nav p-4" src="/images/icons/swordcyan.png" alt=""></a>

            <a class="" href="{{ route('skills.index', auth()->user()->character) }}"><img class="icons-nav p-4" src="/images/icons/orangeskill.png" alt=""></a>
        </nav>
    @endif
</x-app-layout>
