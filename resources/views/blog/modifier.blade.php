<!-- resources/views/blog/modifier.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Compte - Baobab Express</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Modifier Compte</h1>

        <form action="{{ route('blog.modifier.submit') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>
