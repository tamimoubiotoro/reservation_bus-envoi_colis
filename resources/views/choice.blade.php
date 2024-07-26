<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez une Option</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Bienvenue !</h1>
        <p class="text-center mb-6">Choisissez l'une des options suivantes :</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Se Connecter</a>
            <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded">Créer un Compte</a>
        </div>
    </div>
</body>
</html>
