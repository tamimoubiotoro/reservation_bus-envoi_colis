<!-- resources/views/blog/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Baobab Express</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur le blog de Baobab Express</h1>
        <nav>
            <ul>
                <li><a href="{{ route('blog.index') }}">Accueil</a></li>
                <li><a href="{{ route('blog.reserver') }}">Réserver une place</a></li>
                <li><a href="{{ route('blog.modifier') }}">Modifier Compte</a></li>
            </ul>
        </nav>

        <h2>Voyages Disponibles</h2>
        <ul>
            @foreach($voyages as $voyage)
                <li>
                    Voyage ID: {{ $voyage->id }} - Trajet: {{ $voyage->trajet_id }} - Statut: {{ $voyage->statut }}
                </li>
            @endforeach
        </ul>

        <h2>Colis</h2>
        <ul>
            @foreach($colis as $coli)
                <li>
                    Colis ID: {{ $coli->id }} - Description: {{ $coli->description }} - Statut: {{ $coli->statut }}
                    <a href="{{ route('blog.suivi', $coli->id) }}">Suivre</a>
                </li>
            @endforeach
        </ul>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
