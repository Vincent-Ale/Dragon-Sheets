<x-menu />
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        
    <div class="bg-gravel w-72 h-16 ml-2.5 flex items-center justify-center rounded-lg">
        <div class="bg-blue flex w-[17rem] h-12 rounded-lg text-4xl text-center items-center justify-center pt-2 ">
            <h1 class="titre-stats" >Caractéristiques</h1>
        </div>
    </div>

        <div class="flex flex-col items-center">
            <form action="{{ route('stats.update', $character) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" id="recovery-profy" value="{{ $character->proficiency }}">
                
                <div class="flex flex-col items-center mt-6">
                    @foreach ($character->stats as $stat)

                        <div class="stat-group mb-6 p-2 rounded-md border">

                            <div class="name-stat-profi flex flex-row items-end justify-between mb-1">
                                <input type="text" name="stats[{{ $stat->id }}][name]" value="{{ $stat->name }}" readonly class="stat-name input-no-padding text-left text-2xl">
                                <dt class="cyan-text text-xl font-medium mr-2">Maîtrise</dt>
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="profibox" name="stats[{{ $stat->id }}][proficiency]" {{ $stat->proficiency ? 'checked' : '' }} >
                                    <span class="checkmark rounded"></span>
                                </label>
                            </div>
                            
                            <div class="box-stats flex flex-row">
                                <div class="modithrow flex flex-col justify-center mr-2">
                                    <div class="flex flex-row items-center p-2">
                                        <dd class="text-3xl text-white">
                                            <input type="number" class="modifier input-hidden" name="stats[{{ $stat->id }}][modifier]" value="{{ $stat->modifier }}" readonly>
                                        </dd>
                                        <dt class="cyan-text text-l font-medium">Modificateur</dt>
                                    </div>
                                    <div class="flex flex-row items-center px-2 py-1">
                                        <dd class="text-3xl text-white">
                                            <input type="number" class="saving_throw input-hidden" name="stats[{{ $stat->id }}][saving_throw]" value="{{ $stat->saving_throw }}" readonly >
                                        </dd>
                                        <dt class="cyan-text text-l font-medium">Jets de Sauvegarde</dt>
                                    </div>
                                </div>
                                <div class="base-bonus flex flex-col justify-center">
                                    <div class="flex flex-row items-center p-2">
                                        <dd class="case-stat mr-1 rounded text-xl">
                                            <input type="number" class="base rounded input-stat" name="stats[{{ $stat->id }}][base]" value="{{ $stat->base }}">
                                        </dd>
                                        <dt class="cyan-text text-l font-medium">Base</dt>
                                    </div>
                                    <div class="flex flex-row items-center justify-between p-2">
                                        <dd class="case-stat mr-1 rounded text-xl">
                                            <input type="number" class="bonus rounded input-stat" name="stats[{{ $stat->id }}][bonus]" value="{{ $stat->bonus }}">
                                        </dd>
                                        <dt class="cyan-text text-l font-medium">Bonus</dt>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center mt-4">

                    @if ($character->is_created == true)

                    <button type="submit" class="btn-modif mr-4 inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full ">
                        Sauvegarder
                    </button>

                    <a href="{{ route('stats.index', $character) }}" class="btn-cancel inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full">
                        Annuler
                    </a>

                    @else

                    <button type="submit" class="btn-modif inline-flex items-center text-2xl px-4 py-2 border border-transparent rounded-full ">
                        Suivant
                    </button>

                    @endif

                </div>
            </form>
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