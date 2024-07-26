<?php

// app/Http/Controllers/BusController.php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    public function create()
    {
        return view('admin.buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'numero' => 'required|string|max:255|unique:buses',
            'capacite' => 'required|integer|min:1',
        ]);

        Bus::create($request->all());

        return redirect()->route('bus.index')->with('success', 'Bus ajouté avec succès.');
    }

    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'numero' => 'required|string|max:255|unique:buses,numero,' . $bus->id,
            'capacite' => 'required|integer|min:1',
        ]);

        $bus->update($request->all());

        return redirect()->route('bus.index')->with('success', 'Bus mis à jour avec succès.');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();

        return redirect()->route('bus.index')->with('success', 'Bus supprimé avec succès.');
    }
}

