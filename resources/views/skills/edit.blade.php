<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

        <div class="bg-gravel w-72 h-16 ml-2.5 flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1 class="">Compétences</h1>
            </div>
        </div>

        <div class="text-font flex flex-col items-start justify-center ml-3 mt-6 shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('skills.update', $character) }}" method="POST">
                @csrf
                @method('PUT')
                               
                @foreach ($character->skills as $skill)
                    <div class="flex flex-row items-center justify-center mb-6">
                        <div class="flex flex-row items-center justify-center text-2xl">
                            <dd class="text-color-orange skill-name text-2xl text-center rounded-l-full py-1">{{ $skill->name }}</dd>
                            <dd class="flex flex-row items-center justify-center text-2xl text-white border-set-tb px-4 bg-light-blue py-1">{{ $skill->value }}</dd>
                        </div>

                        <input type="hidden" name="skills[{{ $skill->id }}][name]" value="{{ $skill->name }}">
                        <input type="hidden" name="skills[{{ $skill->id }}][value]" value="{{ $skill->value }}">
                        
                        <div class="flex flex-row border-set-star" x-data="{ proficiency: {{ $skill->proficiency ? 'true' : 'false' }}, expertise: {{ $skill->expertise ? 'true' : 'false' }} }">
                            <div class="flex flex-col items-center justify-center border-set-right p-1">
                            <input type="hidden" name="skills[{{ $skill->id }}][proficiency]" x-bind:value="proficiency ? '1' : '0'">
                            <input type="checkbox" x-model="proficiency" class="hidden">
                            <label for="proficiency-{{ $skill->id }}" @click="proficiency = !proficiency; if (!proficiency) expertise = false">
                                <img :src="proficiency ? '/images/icons/silverstaricon.png' : '/images/icons/silverstaricon2.png'" alt="{{ $skill->proficiency ? 'Yes' : 'No' }}" class="w-8 h-8 cursor-pointer">
                            </label>
                            </div>
                            <div class="flex flex-col items-center justify-center border-set-left p-1">
                            <input type="hidden" name="skills[{{ $skill->id }}][expertise]" x-bind:value="expertise ? '1' : '0'">
                            <input type="checkbox" x-model="expertise" class="hidden">
                                <label for="expertise-{{ $skill->id }}" @click="expertise = !expertise; proficiency = expertise ? true : proficiency">
                                    <img :src="expertise ? '/images/icons/goldstaricon.png' : '/images/icons/goldstaricon2.png'" alt="{{ $skill->expertise ? 'Yes' : 'No' }}" class="w-8 h-8 cursor-pointer">
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
                <div class="mt-4 flex space-x-2">
                    
                    @if ($character->is_created == true)

                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Sauvegarder
                    </button>


                    @else

                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 mx-auto border border-transparent rounded-full">
                        Terminer la création
                    </button>

                    @endif

                    @if ($character->is_created == true)
                    
                    <a href="{{ route('skills.index', $character) }}" class="btn-cancel inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Annuler
                    </a>

                    @endif
                </div>
            </form>
        </div>
    </div>
    @if($character && $character->is_created == 1)
        <nav class="navbar-char h-24 flex flex-row justify-center items-center">
            <a class="bg-blue-char " href="{{ route('characters.show', $character) }}"><img class="icons-nav p-4" src="/images/icons/avatar-cyan.png" alt=""></a>

            <a class="bg-blue-char" href="{{ route('stats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/braincyan.png" alt=""></a>

            <a class="bg-blue-char rounded-tr-3xl" href="{{ route('combats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/swordcyan.png" alt=""></a>

            <a class="" href="{{ route('skills.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/orangeskill.png" alt=""></a>
        </nav>
    @endif
</x-app-layout>
