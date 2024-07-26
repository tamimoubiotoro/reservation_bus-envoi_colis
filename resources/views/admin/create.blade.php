<!-- resources/views/admin/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un utilisateur</h1>

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role">Rôle</label>
            <select name="role" id="role" class="form-control" required>
                <option value="client">Client</option>
                <option value="agent">Agent</option>
                <option value="controleur">Contrôleur</option>
                <option value="administrateur">Administrateur</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
