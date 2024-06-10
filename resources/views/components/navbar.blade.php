<nav class="navbar-icons flex flex-row justify-evenly pb-2 pr-2">
    @if(auth()->user() && auth()->user()->character->is_created)
        <a class="" href="{{ route('characters.show', auth()->user()->character) }}"><img class="icons-nav" src="/images/icons/avatar-cyan.png" alt=""></a>

        <a class="" href="{{ route('stats.index', auth()->user()->character) }}"><img class="icons-nav" src="/images/icons/braincyan.png" alt=""></a>

        <a class="" href="{{ route('combats.index', auth()->user()->character) }}"><img class="icons-nav" src="/images/icons/cyanskill.png" alt=""></a>

        <a class="" href="{{ route('skills.index', auth()->user()->character) }}"><img class="icons-nav" src="/images/icons/swordcyan.png" alt=""></a>
    @endif
</nav>


