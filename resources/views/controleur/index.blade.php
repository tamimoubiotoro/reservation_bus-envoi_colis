<!-- resources/views/controleur/reservations/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des réservations</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du client</th>
                <th>Voyage</th>
                <th>Date de réservation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->nom }}</td>
                    <td>{{ $reservation->voyage->nom }}</td>
                    <td>{{ $reservation->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-primary">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



<!-- resources/views/controleur/reservations/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Réservations</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Trajet</th>
                <th>Date de Réservation</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->utilisateur->nom }}</td>
                    <td>{{ $reservation->trajet->ville_depart }} - {{ $reservation->trajet->ville_arrivee }}</td>
                    <td>{{ $reservation->date_reservation }}</td>
                    <td>{{ $reservation->statut }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
