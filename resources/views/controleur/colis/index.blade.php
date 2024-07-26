<!-- resources/views/controleur/colis/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des colis</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Expéditeur</th>
                <th>Destinataire</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colis as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->expediteur }}</td>
                    <td>{{ $c->destinataire }}</td>
                    <td>{{ $c->status }}</td>
                    <td>
                        <form action="{{ route('colis.update', $c->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="enregistré" {{ $c->status == 'enregistré' ? 'selected' : '' }}>Enregistré</option>
                                <option value="en cours d'envoi" {{ $c->status == 'en cours d'envoi' ? 'selected' : '' }}>En cours d'envoi</option>
                                <option value="envoyé" {{ $c->status == 'envoyé' ? 'selected' : '' }}>Envoyé</option>
                                <option value="retiré" {{ $c->status == 'retiré' ? 'selected' : '' }}>Retiré</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


<!-- resources/views/controleur/colis/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Colis</h1>

    <a href="{{ route('controleur.colis.create') }}" class="btn btn-primary">Enregistrer un Colis</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Poids</th>
                <th>Statut</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colis as $coli)
                <tr>
                    <td>{{ $coli->id }}</td>
                    <td>{{ $coli->description }}</td>
                    <td>{{ $coli->poids }}</td>
                    <td>{{ $coli->statut }}</td>
                    <td>{{ $coli->utilisateur->nom }}</td>
                    <td>
                        <a href="{{ route('controleur.colis.edit', $coli->id) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('controleur.colis.destroy', $coli->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce colis ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

