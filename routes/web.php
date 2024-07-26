<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ColisController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\ConducteurController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\AgentController;

use App\Http\Controllers\ControleurController;


//use App\Http\Controllers\ReservationController;
//use App\Http\Controllers\ColisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


/************************************* */
// routes/web.php

//use App\Http\Controllers\BlogController;

// Routes pour le blog
Route::middleware(['auth'])->group(function () {
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/reserver', [BlogController::class, 'reserver'])->name('blog.reserver');
    Route::post('/blog/reserver', [BlogController::class, 'reserverSubmit'])->name('blog.reserver.submit');
    Route::get('/blog/colis/{id}/suivi', [BlogController::class, 'suiviColis'])->name('blog.suivi');
    Route::get('/blog/modifier', [BlogController::class, 'modifierCompte'])->name('blog.modifier');
    Route::post('/blog/modifier', [BlogController::class, 'modifierCompteSubmit'])->name('blog.modifier.submit');
    
});

// routes/web.php


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/blog.home', [HomeController::class, 'index'])->name('home');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

    Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store']);
    Route::resource('colis', ColisController::class)->only(['index', 'create', 'store']);
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'role:administrateur'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('bus', BusController::class);
    Route::resource('horaires', HoraireController::class);
    Route::resource('conducteurs', ConducteurController::class);
});


// routes/web.php


Route::middleware(['auth', 'role:controleur'])->group(function () {
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('colis', [ColisController::class, 'index'])->name('colis.index');
    Route::patch('colis/{colis}/update', [ColisController::class, 'update'])->name('colis.update');
});


// routes/web.php


Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('colis/retrait', [AgentController::class, 'index'])->name('agent.colis.index');
    Route::patch('colis/retrait/{colis}', [AgentController::class, 'retrait'])->name('agent.colis.retrait');
});



// Routes pour le contrôleur
Route::middleware(['auth', 'can:isControleur'])->group(function () {
    Route::get('/controleur/reservations', [ControleurController::class, 'indexReservations'])->name('controleur.reservations.index');

    Route::get('/controleur/colis', [ControleurController::class, 'indexColis'])->name('controleur.colis.index');
    Route::get('/controleur/colis/create', [ControleurController::class, 'createColis'])->name('controleur.colis.create');
    Route::post('/controleur/colis', [ControleurController::class, 'storeColis'])->name('controleur.colis.store');
    Route::get('/controleur/colis/{colis}/edit', [ControleurController::class, 'editColis'])->name('controleur.colis.edit');
    Route::put('/controleur/colis/{colis}', [ControleurController::class, 'updateColis'])->name('controleur.colis.update');
    Route::delete('/controleur/colis/{colis}', [ControleurController::class, 'destroyColis'])->name('controleur.colis.destroy');
});
  
//use Illuminate\Support\Facades\Route;

// Route pour la page de choix utilisateur
Route::get('/', [AuthController::class, 'index'])->name('home');

// Route pour la page de connexion
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Route pour la page d'inscription
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Autres routes d'authentification, si nécessaire
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/register', [AuthController::class, 'store'])->name('store');


//require __DIR__.'/auth.php';
Route::get('/blog/index', [App\Http\Controllers\BlogController::class, 'index']);

//use App\Http\Controllers\HomeController;

// Accéder à la page d'accueil
Route::get('/blog.home', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [HomeController::class, 'index']); // Pour l'URL racine
