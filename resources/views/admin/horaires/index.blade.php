<!-- resources/views/admin/horaires/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des horaires</h1>

    <a href="{{ route('horaire.create') }}" class="btn btn-primary">Ajouter un horaire</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Départ</th>
                <th>Arrivée</th>
                <th>Heure de départ</th>
                <th>Heure d'arrivée</th>
                <th>Bus</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horaires as $horaire)
                <tr>
                    <td>{{ $horaire->depart }}</td>
                    <td>{{ $horaire->arrivee }}</td>
                    <td>{{ $horaire->heure_depart }}</td>
                    <td>{{ $horaire->heure_arrivee }}</td>
                    <td>{{ $horaire->bus->nom }}</td>
                    <td>
                        <a href="{{ route('horaire.edit', $horaire->id) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('horaire.destroy', $horaire->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
