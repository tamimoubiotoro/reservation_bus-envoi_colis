<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Coli;

//class BlogController extends Controller
//{
    //
//}

// app/Http/Controllers/BlogController.php

//namespace App\Http\Controllers;

//use Illuminate\Http\Request;


class BlogController extends Controller
{
    // Affiche la page de blog principale
    public function index()
    {
        // Récupérer les voyages et les colis de l'utilisateur connecté
        $voyages = Reservation::where('user_id', Auth::id())->get();
        $colis = Coli::where('user_id', Auth::id())->get();

        return view('blog.index', compact('voyages', 'colis'));
    }

    // Page de réservation
    public function reserver()
    {
        return view('blog.reserver');
    }

    // Soumettre une réservation
    public function reserverSubmit(Request $request)
    {
        // Valider les données
        $request->validate([
            'trajet_id' => 'required|exists:trajets,id',
            'place' => 'required|integer',
        ]);

        // Créer une nouvelle réservation
        Reservation::create([
            'user_id' => Auth::id(),
            'trajet_id' => $request->trajet_id,
            'place' => $request->place,
            'statut' => 'Réservé',
        ]);

        return redirect()->route('blog.index')->with('success', 'Réservation effectuée avec succès !');
    }

    // Suivre un colis
    public function suiviColis($id)
    {
        $coli = Coli::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$coli) {
            return redirect()->route('blog.index')->with('error', 'Colis non trouvé.');
        }

        return view('blog.suivi', compact('coli'));
    }

    // Modifier le compte utilisateur
    public function modifierCompte()
    {
        $user = Auth::user();

        return view('blog.modifier', compact('user'));
    }

    // Soumettre les modifications du compte
    public function modifierCompteSubmit(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('blog.index')->with('success', 'Compte modifié avec succès !');
    }
}
