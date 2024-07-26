<?php

// app/Http/Controllers/AgentController.php

namespace App\Http\Controllers;

use App\Models\Colis;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $colis = Colis::where('status', 'envoyé')->get();
        return view('agent.colis.index', compact('colis'));
    }

    public function retrait(Request $request, Colis $colis)
    {
        $colis->update(['status' => 'retiré']);
        return redirect()->route('agent.colis.index')->with('success', 'Colis marqué comme retiré.');
    }
}
