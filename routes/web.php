<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmisController;
use  App\Http\Controllers\ChercheurController;
use  App\Http\Controllers\RecruteurController;
use  App\Http\Controllers\OffreController;

Route::get('/home', [AmisController::class,'show'])->name('home');

// Route::post('/home', [AmisController::class, 'search'])->name('search');

Route::get('/', function () {
    return view('auth.register');
})->middleware('guest');


// profil user
Route::get('/profile/edit',[ProfileController::class,'show'])->name('profile.edit');

Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');

// detail profil
Route::get('/detail/{id}', [AmisController::class, 'findUserById'])->name('detail');
// logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// profil chercheur
Route::get('/profil',[ChercheurController::class,'getName'])->name('profil');
Route::post('/chercheur',[ChercheurController::class,'createProfil'])->name('create.profile');

//offre
Route::get('/detailoffre/{id}',[OffreController::class,'detailOffre']);
// Route::post('postuler',[ChercheurController::class,'postulerOffre']);

Route::get('chercherOffre/',[ChercheurController::class,'chercheOffre']);

// creer offre
Route::get('offrePage',function(){
    return view('createoffre');
})->name('offresPage');

Route::post('offre-create',[RecruteurController::class,'createOffre'])->name('create.offre');
// affiche offre
Route::get('offres-view',[OffreController::class,'affichierOffres'])->name('offres');










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
