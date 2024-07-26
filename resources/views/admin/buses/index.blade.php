<!-- resources/views/admin/buses/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des bus</h1>

    <a href="{{ route('bus.create') }}" class="btn btn-primary">Ajouter un bus</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Numéro</th>
                <th>Capacité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buses as $bus)
                <tr>
                    <td>{{ $bus->nom }}</td>
                    <td>{{ $bus->numero }}</td>
                    <td>{{ $bus->capacite }}</td>
                    <td>
                        <a href="{{ route('bus.edit', $bus->id) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('bus.destroy', $bus->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bus ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
