<?php
// app/Http/Controllers/HomeController.php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('blog.home');
    }
}*/


//<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user(); // ou $utilisateur = User::find($id);

        // Vérifier si l'utilisateur est null
        if (is_null($user)) {
            // Rediriger ou gérer l'erreur
            return redirect()->route('login')->withErrors('Utilisateur introuvable.');
        }

        // Passer l'utilisateur à la vue
        return view('blog.home', compact('user'));
    }
}
