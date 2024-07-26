<?php

// app/Http/Controllers/HoraireController.php

namespace App\Http\Controllers;

use App\Models\Horaire;
use App\Models\Bus;
use Illuminate\Http\Request;

class HoraireController extends Controller
{
    public function index()
    {
        $horaires = Horaire::all();
        return view('admin.horaires.index', compact('horaires'));
    }

    public function create()
    {
        $buses = Bus::all();
        return view('admin.horaires.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'depart' => 'required|string|max:255',
            'arrivee' => 'required|string|max:255',
            'heure_depart' => 'required|date_format:H:i',
            'heure_arrivee' => 'required|date_format:H:i|after:heure_depart',
            'bus_id' => 'required|exists:buses,id',
        ]);

        Horaire::create($request->all());

        return redirect()->route('horaire.index')->with('success', 'Horaire ajouté avec succès.');
    }

    public function edit(Horaire $horaire)
    {
        $buses = Bus::all();
        return view('admin.horaires.edit', compact('horaire', 'buses'));
    }

    public function update(Request $request, Horaire $horaire)
    {
        $request->validate([
            'depart' => 'required|string|max:255',
            'arrivee' => 'required|string|max:255',
            'heure_depart' => 'required|date_format:H:i',
            'heure_arrivee' => 'required|date_format:H:i|after:heure_depart',
            'bus_id' => 'required|exists:buses,id',
        ]);

        $horaire->update($request->all());

        return redirect()->route('horaire.index')->with('success', 'Horaire mis à jour avec succès.');
    }

    public function destroy(Horaire $horaire)
    {
        $horaire->delete();

        return redirect()->route('horaire.index')->with('success', 'Horaire supprimé avec succès.');
    }
}
