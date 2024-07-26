<?php


namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Colis;
use Illuminate\Http\Request;

class ControleurController extends Controller
{
    /**
     * Afficher la liste des réservations
     */
    public function indexReservations()
    {
        // Récupérer toutes les réservations
        $reservations = Reservation::with(['utilisateur', 'trajet'])->get();

        return view('controleur.reservations.index', compact('reservations'));
    }

    /**
     * Afficher la liste des colis
     */
    public function indexColis()
    {
        // Récupérer tous les colis
        $colis = Colis::with('utilisateur')->get();

        return view('controleur.colis.index', compact('colis'));
    }

    /**
     * Afficher le formulaire pour enregistrer un nouveau colis
     */
    public function createColis()
    {
        return view('controleur.colis.create');
    }

    /**
     * Enregistrer un nouveau colis
     */
    public function storeColis(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'poids' => 'required|numeric',
            'statut' => 'required|in:Enregistré,En transit,Livré,Retiré',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        Colis::create($request->all());

        return redirect()->route('controleur.colis.index')->with('success', 'Colis enregistré avec succès.');
    }

    /**
     * Afficher le formulaire pour mettre à jour un colis
     */
    public function editColis(Colis $colis)
    {
        return view('controleur.colis.edit', compact('colis'));
    }

    /**
     * Mettre à jour la situation d'un colis
     */
    public function updateColis(Request $request, Colis $colis)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'poids' => 'required|numeric',
            'statut' => 'required|in:Enregistré,En transit,Livré,Retiré',
        ]);

        $colis->update($request->all());

        return redirect()->route('controleur.colis.index')->with('success', 'Situation du colis mise à jour avec succès.');
    }

    /**
     * Supprimer un colis
     */
    public function destroyColis(Colis $colis)
    {
        $colis->delete();

        return redirect()->route('controleur.colis.index')->with('success', 'Colis supprimé avec succès.');
    }
}

