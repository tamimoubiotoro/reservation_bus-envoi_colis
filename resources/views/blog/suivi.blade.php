<!-- resources/views/blog/suivi.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi du Colis - Baobab Express</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Suivi du Colis</h1>

        <p>ID: {{ $coli->id }}</p>
        <p>Description: {{ $coli->description }}</p>
        <p>Statut: {{ $coli->statut }}</p>

        <a href="{{ route('blog.index') }}">Retour</a>
    </div>
</body>
</html>
