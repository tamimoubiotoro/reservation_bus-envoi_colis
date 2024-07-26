<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Connexion</h1>
        <form action="{{ route('authenticate') }}" method="POST" class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg">
            @csrf
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Adresse Email</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de Passe</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded">Se Connecter</button>
        </form>
    </div>
</body>
</html>
