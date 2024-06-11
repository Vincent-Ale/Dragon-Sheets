<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

    <div class="bg-gravel w-72 h-16 ml-2.5 flex items-center justify-center rounded-lg">
        <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
            <h1 class="titre-stats" >Caractéristiques</h1>
        </div>
    </div>

        
            
            <div class="flex flex-col items-center mt-10">
                @foreach ($character->stats as $stat)
                    <div class="stat-container  mb-6 p-2 rounded-md border">
                        <div class="name-stat-profi flex flex-row items-end justify-between mb-1">
                            <dd class="stat-name text-left text-2xl">{{ $stat->name }}</dd>
                            <div class="flex flex-row items-center ">
                                <dt class="cyan-text text-xl font-medium mr-2">Maîtrise</dt>
                                <label class="custom-checkbox ">
                                    <input type="checkbox" class="rounded" {{ $stat->proficiency ? 'checked' : '' }} disabled>
                                    <span class="checkmark rounded"></span>
                                </label>
                            </div>
                        </div>
                        <div class="box-stats flex flex-row">
                            <div class="modithrow flex flex-col mr-2">
                                <div class="flex flex-row items-center p-2">
                                    <dd class="mx-3 text-3xl text-white">{{ $stat->modifier }}</dd>
                                    <dt class="cyan-text text-l font-medium ">Modificateur</dt>
                                </div>
                                <div class="flex flex-row items-center px-2 py-1">
                                    <dd class="mx-3 text-3xl text-white">{{ $stat->saving_throw }}</dd>
                                    <dt class="cyan-text text-l font-medium ">Jets de Sauvegarde</dt>
                                </div>
                            </div>
                            <div class="base-bonus flex flex-col">
                                <div class="flex flex-row items-center p-2">
                                    <dd class="case-stat mr-1 border-2 rounded px-3 text-xl">{{ $stat->base }}</dd>
                                    <dt class="cyan-text text-l font-medium ">Base</dt>
                                </div>
                                <div class="flex flex-row items-center justify-between p-2">
                                    <dd class="case-stat mr-1 border-2 rounded px-3 text-xl">{{ $stat->bonus }}</dd>
                                    <dt class="cyan-text text-l font-medium ">Bonus</dt>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        <div class="flex justify-center">
            <a href="{{ route('stats.edit', $character) }}" class="btn-modif inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                Modifier
            </a>
        </div>
    </div>
    @if($character && $character->is_created == 1)
        <nav class="navbar-char h-24 flex flex-row justify-center items-center">
            <a class="bg-blue-char rounded-tr-3xl" href="{{ route('characters.show', $character) }}"><img class="icons-nav p-4" src="/images/icons/avatar-cyan.png" alt=""></a>

            <a class="" href="{{ route('stats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/brainorange.png" alt=""></a>

            <a class="bg-blue-char rounded-tl-3xl" href="{{ route('combats.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/swordcyan.png" alt=""></a>

            <a class="bg-blue-char" href="{{ route('skills.index', $character) }}"><img class="icons-nav p-4" src="/images/icons/cyanskill.png" alt=""></a>
        </nav>
    @endif
</x-app-layout>