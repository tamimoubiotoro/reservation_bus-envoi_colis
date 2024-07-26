<!-- resources/views/controleur/colis/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Colis</h1>

    <form action="{{ route('controleur.colis.update', $colis->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $colis->description }}" required>
        </div>

        <div class="form-group">
            <label for="poids">Poids (kg)</label>
            <input type="number" step="0.01" name="poids" id="poids" class="form-control" value="{{ $colis->poids }}" required>
        </div>

        <div class="form-group">
            <label for="statut">Statut</label>
            <select name="statut" id="statut" class="form-control" required>
                <option value="Enregistré" {{ $colis->statut == 'Enregistré' ? 'selected' : '' }}>Enregistré</option>
                <option value="En transit" {{ $colis->statut == 'En transit' ? 'selected' : '' }}>En transit</option>
                <option value="Livré" {{ $colis->statut == 'Livré' ? 'selected' : '' }}>Livré</option>
                <option value="Retiré" {{ $colis->statut == 'Retiré' ? 'selected' : '' }}>Retiré</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
