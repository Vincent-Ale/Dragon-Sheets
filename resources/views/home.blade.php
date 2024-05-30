<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Trykker&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Trade+Winds&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Vollkorn+SC&display=swap');
    </style>
    {{-- <link rel="stylesheet" href="home.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="container">

        <div class="gravel">

            <div class="title">
                <h1>Dragon Sheet</h1>
            </div>

            <div class="menu">
            </div>
        </div>

        <div class="main">
            <h2 class="bv">Bienvenue</h2>
            <h2 class="txt">Connecte toi et crée tes propres personnages qui te suivront tout le long de tes voyages...
            </h2>
        </div>

        <div class="duo">
            <div class="options">
                <div class="co">
                    <h2><a href="connection.html">Se Connecter</a> </h2>
                </div>

            </div>
            <div class="options">
                <div class="cre">
                    <h2><a href="create.html">Créer un compte</a> </h2>
                </div>
            </div>
        </div>

        <div class="corbeau">
            <img src="{{ asset('images/crow.png') }}">
        </div>
    </div>

</body>

</html>