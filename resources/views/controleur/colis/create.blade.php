<!-- resources/views/controleur/colis/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Enregistrer un Colis</h1>

    <form action="{{ route('controleur.colis.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="poids">Poids (kg)</label>
            <input type="number" step="0.01" name="poids" id="poids" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="statut">Statut</label>
            <select name="statut" id="statut" class="form-control" required>
                <option value="Enregistré">Enregistré</option>
                <option value="En transit">En transit</option>
                <option value="Livré">Livré</option>
                <option value="Retiré">Retiré</option>
            </select>
        </div>

        <div class="form-group">
            <label for="utilisateur_id">Client</label>
            <select name="utilisateur_id" id="utilisateur_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
