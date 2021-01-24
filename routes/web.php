<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\CandidatureController;


Auth::routes();

Route::get('/', [OffreController::class,'accueil'])->name('accueil');

Route::view('/a-propos', "pages.Apropos");
Route::view('/contact', "pages.contact");


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::resource('/profile', ProfileController::class)->only(["update","destroy"]);


Route::get("/recruteur",function(){
    return view("recruteur.index");
});
Route::group(['prefix' => 'espace'], function () {

    // Stagiaire
    Route::resource('/stagiaire', StagiaireController::class)->only(["create","store"]);
    Route::resource('/demandes', DemandeController::class);
    Route::get('/all/demandes', [DemandeController::class, 'all'])->name("all.demandes");
    Route::resource('/postules', PostuleController::class);
    Route::get('/candidatures', [CandidatureController::class, 'index'])->name("candidatures.index");

    // Recruteur
    Route::resource('/offres', OffreController::class);
    Route::resource('/messages', MessageController::class)->only(["index", "store", "destroy"]);
    Route::resource("/entreprise/fiche",EntrepriseController::class)->only(["index","store"]);
});

Route::get('/all/offres', [OffreController::class,"all"])->name("offres.all");

