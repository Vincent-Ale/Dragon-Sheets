<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-gravel w-72 h-16 ml-2.5 flex items-center justify-center rounded-lg">
            <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
                <h1 class="">Compétences</h1>
            </div>
        </div>

        <div class="text-font flex flex-col items-start justify-center ml-3 mt-6 shadow overflow-hidden sm:rounded-lg">
            @foreach ($character->skills as $skill)
            <div class="flex flex-row items-center justify-center mb-6 ">
                <div class="flex flex-row items-center justify-center text-2xl">
                    <dd class="text-color-orange skill-name text-2xl text-center rounded-l-full py-1">{{ $skill->name }}</dd>
                    <dd class="flex flex-row items-center justify-center text-2xl text-white border-set-tb px-4 bg-light-blue py-1">{{ $skill->value }}</dd>
                </div>
                <div class="flex flex-row border-set-star">
                    <div class="flex flex-col items-center justify-center border-set-right p-1">
                        <dd class="w-8 h-8">{!! $skill->proficiency ? '<img src="/images/icons/silverstaricon.png" alt="Yes">' : '<img src="/images/icons/silverstaricon2.png" alt="No">' !!}</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center border-set-left p-1">
                        <dd class="w-8 h-8">{!! $skill->expertise ? '<img src="/images/icons/goldstaricon.png" alt="Yes">' : '<img src="/images/icons/goldstaricon2.png" alt="No">' !!}</dd>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="flex justify-center">
            <a href="{{ route('skills.edit', $character) }}" class="btn-modif inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                Modifier
            </a>
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
