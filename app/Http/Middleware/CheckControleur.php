<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckControleur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}

use Illuminate\Support\Facades\Auth;

class CheckControleur
{
    
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'Controleur') {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Vous n\'avez pas accès à cette section.');
    }
}
