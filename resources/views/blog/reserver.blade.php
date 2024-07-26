<!-- resources/views/blog/reserver.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une Place - Baobab Express</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Réserver une Place</h1>

        <form action="{{ route('blog.reserver.submit') }}" method="POST">
            @csrf
            <div>
                <label for="trajet_id">Trajet ID:</label>
                <input type="number" id="trajet_id" name="trajet_id" required>
            </div>
            <div>
                <label for="place">Nombre de places:</label>
                <input type="number" id="place" name="place" required>
            </div>
            <button type="submit">Réserver</button>
        </form>
    </div>
</body>
</html>
