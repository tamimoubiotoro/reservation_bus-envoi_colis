<!-- resources/views/admin/horaires/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un horaire</h1>

    <form action="{{ route('horaire.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="depart">Départ</label>
            <input type="text" name="depart" id="depart" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="arrivee">Arrivée</label>
            <input type="text" name="arrivee" id="arrivee" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="heure_depart">Heure de départ</label>
            <input type="time" name="heure_depart" id="heure_depart" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="heure_arrivee">Heure d'arrivée</label>
            <input type="time" name="heure_arrivee" id="heure_arrivee" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="bus_id">Bus</label>
            <select name="bus_id" id="bus_id" class="form-control" required>
                @foreach ($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
