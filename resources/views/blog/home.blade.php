<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenue, {{ auth()->user()->nom }}</h1>
    <p>Votre tableau de bord client</p>

    <ul>
        <li><a href="{{ route('blog.index') }}">Voyages disponibles</a></li>
        <li><a href="{{ route('reservations.index') }}">Historique de voyages</a></li>
        <li><a href="{{ route('colis.index') }}">Historique de colis</a></li>
        <li><a href="{{ route('reservations.create') }}">Réserver une place</a></li>
        <li><a href="{{ route('colis.create') }}">Suivre un colis</a></li>
        <li><a href="{{ route('profile.edit') }}">Modifier le compte</a></li>
    </ul>
</div>
@endsection
