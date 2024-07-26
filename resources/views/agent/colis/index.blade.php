<!-- resources/views/agent/colis/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des colis à retirer</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Expéditeur</th>
                <th>Destinataire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colis as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->expediteur }}</td>
                    <td>{{ $c->destinataire }}</td>
                    <td>
                        <form action="{{ route('agent.colis.retrait', $c->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success" onclick="return confirm('Confirmez-vous le retrait de ce colis ?')">Marquer comme retiré</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
