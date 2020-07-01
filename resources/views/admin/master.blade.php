<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/admin-styles.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('/favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('/favicon.ico') }}">

    <title>
        @yield('title')
    </title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
              <img src="/images/logo.svg" height="40" alt="">
            </a>

            <a href="/logout">Déconnexion</a>
          </nav>

        <header class="mt-3 mb-3">
            <h2>Administration</h2>
        </header>

        <nav class="navbar navbar-expand-lg navbar-light nav-secondary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/administration">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/administration/utilisateurs">Utilisateurs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/administration/potagers">Potagers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/administration/plants">Plants</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/administration/utilisateurs">Échanges</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/administration/visites">Visites</a>
                </li>
              </ul>
            </div>
          </nav>
        <main>

             @yield('content')

        </main>
    </div>
</body>
</html>
