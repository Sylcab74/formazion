<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <title>Formazion | @yield('title')</title>
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8"/>
    <meta name="description" content="Lorem ipsum"/>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../public/css/style.css"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Formazion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/person">Persons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/session">Sessions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/formation">Formations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/company">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/room">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/session/previous">Previous Session</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container">
        @yield('content')
    </main>
    <footer>
        <p>© Formazion - Tous droits réservés</p>
    </footer>
@yield('javascript')
</body>
</html>
