<!-- resources/views/admin/buses/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un bus</h1>

    <form action="{{ route('bus.store') }}" method="POST">
        @csrf 

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numero">Numéro</label>
            <input type="text" name="numero" id="numero" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="capacite">Capacité</label>
            <input type="number" name="capacite" id="capacite" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
