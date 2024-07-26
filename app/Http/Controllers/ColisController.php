<?php

// app/Http/Controllers/ColisController.php

namespace App\Http\Controllers;

use App\Models\Colis;
use Illuminate\Http\Request;

class ColisController extends Controller
{
    public function index()
    {
        $colis = Colis::all();
        return view('controleur.colis.index', compact('colis'));
    }

    public function update(Request $request, Colis $colis)
    {
        $colis->update($request->all());
        return redirect()->route('colis.index')->with('success', 'Colis mis à jour avec succès.');
    }
}
