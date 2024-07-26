<?php

// app/Http/Controllers/ConducteurController.php

namespace App\Http\Controllers;

use App\Models\Conducteur;
use Illuminate\Http\Request;

class ConducteurController extends Controller
{
    public function index()
    {
        $conducteurs = Conducteur::all();
        return view('admin.conducteurs.index', compact('conducteurs'));
    }

    public function create()
    {
        return view('admin.conducteurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'permis' => 'required|string|max:255|unique:conducteurs',
        ]);

        Conducteur::create($request->all());

        return redirect()->route('conducteur.index')->with('success', 'Conducteur ajouté avec succès.');
    }

    public function edit(Conducteur $conducteur)
    {
        return view('admin.conducteurs.edit', compact('conducteur'));
    }

    public function update(Request $request, Conducteur $conducteur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'permis' => 'required|string|max:255|unique:conducteurs,permis,' . $conducteur->id,
        ]);

        $conducteur->update($request->all());

        return redirect()->route('conducteur.index')->with('success', 'Conducteur mis à jour avec succès.');
    }

    public function destroy(Conducteur $conducteur)
    {
        $conducteur->delete();

        return redirect()->route('conducteur.index')->with('success', 'Conducteur supprimé avec succès.');
    }
}

