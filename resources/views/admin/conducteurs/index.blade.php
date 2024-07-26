<!-- resources/views/admin/conducteurs/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des conducteurs</h1>

    <a href="{{ route('conducteur.create') }}" class="btn btn-primary">Ajouter un conducteur</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Permis</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conducteurs as $conducteur)
                <tr>
                    <td>{{ $conducteur->nom }}</td>
                    <td>{{ $conducteur->prenom }}</td>
                    <td>{{ $conducteur->permis }}</td>
                    <td>
                        <a href="{{ route('conducteur.edit', $conducteur->id) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('conducteur.destroy', $conducteur->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce conducteur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
