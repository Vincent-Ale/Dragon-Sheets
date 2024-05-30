<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Trade+Winds&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Vollkorn+SC&display=swap');
        </style>
        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        

       
    </head>
    <body class="">

    <div class="bg-gravel w-80 h-40 mx-auto mt-4 flex items-center justify-center rounded-2xl">
        <div class="bg-blue flex w-72 h-32 rounded-2xl text-6xl text-center items-center pt-2 ">
            <h1>Dragon Sheets</h1>
        </div>
    </div>

    <h2 class="text-4xl text-center mb-4 mt-8">Bienvenue</h2>

    <p class=" text-center text-2xl px-4 mb-8 " >Connecte toi et crée tes propres personnages qui te suivront tout le long de tes voyages...</p>
                           
        @if (Route::has('login'))
            <nav class="flex flex-col">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class=""
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="connect text-2xl text-center my-4 mx-auto py-1 px-3 rounded-2xl"
                    >
                        Se Connecter
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="create text-2xl text-center my-4 mx-auto py-1 px-3 rounded-2xl"
                        >
                            Créer un Compte
                        </a>
                    @endif
                @endauth
            </nav>
        @endif

    </body>
</html>
