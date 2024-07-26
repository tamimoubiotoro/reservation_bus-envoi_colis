<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
{
    $user = Auth::user(); // Vérifie si l'utilisateur est connecté

    if (!$user) {
        return redirect()->route('login')->withErrors('Veuillez vous connecter.');
    }

    $reservations = DB::table('reservations')->where('user_id', $user->id)->get();

    return view('blog.index', compact('reservations'));
}

}
