<nav class="flex flex-row absolute bottom-0 left-1/2 -translate-x-1/2">
    @if(auth()->user() && auth()->user()->character->is_created)
        <a class="text-xl text-black" href="{{ route('characters.show', auth()->user()->character) }}">character show</a>
        <a class="text-xl text-black" href="{{ route('stats.index', auth()->user()->character) }}">stats</a>
        <a class="text-xl text-black" href="{{ route('combats.index', auth()->user()->character) }}">combat</a>
        <a class="text-xl text-black" href="{{ route('skills.index', auth()->user()->character) }}">skill</a>
    @endif
</nav>


