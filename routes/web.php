<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TableauDeBordController;
use App\Http\Controllers\Admin\ProduitController as AdminProduitController;
use App\Http\Controllers\FavorisController;

// Routes publiques
Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique');
Route::get('/categorie/{slug}', [BoutiqueController::class, 'categorie'])->name('categorie');
Route::get('/cible/{slug}', [BoutiqueController::class, 'cible'])->name('cible');

Route::get('/produit/{slug}', [ProduitController::class, 'afficher'])->name('produit.afficher');

Route::get('/packs', [PackController::class, 'index'])->name('packs.index');
Route::get('/pack/{slug}', [PackController::class, 'afficher'])->name('packs.afficher');

Route::get('/a-propos', [PageController::class, 'aPropos'])->name('pages.a-propos');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/faq', [PageController::class, 'faq'])->name('pages.faq');

Route::prefix('panier')->group(function () {
    Route::get('/', [PanierController::class, 'index'])->name('panier.index');
    Route::post('/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::patch('/modifier/{article}', [PanierController::class, 'modifier'])->name('panier.modifier');
    Route::delete('/supprimer/{article}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
});

Route::prefix('commande')->group(function () {
    Route::get('/', [CommandeController::class, 'index'])->name('commande.index');
    Route::post('/', [CommandeController::class, 'enregistrer'])->name('commande.enregistrer');
    Route::get('/confirmation/{commande}', [CommandeController::class, 'confirmation'])->name('commande.confirmation');
});

// Routes admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentification admin
    Route::get('connexion', [AuthController::class, 'afficherFormulaireConnexion'])->name('connexion');
    Route::post('connexion', [AuthController::class, 'connecter'])->name('connecter');
    Route::post('deconnexion', [AuthController::class, 'deconnecter'])->name('deconnexion');

    // Dashboard
    Route::get('/', [TableauDeBordController::class, 'index'])->name('tableau-de-bord')->middleware('auth');

    // Produits
    Route::get('produits', [AdminProduitController::class, 'index'])->name('produits.index')->middleware('auth');
    Route::get('produits/creer', [AdminProduitController::class, 'creer'])->name('produits.creer')->middleware('auth');
    Route::post('produits', [AdminProduitController::class, 'enregistrer'])->name('produits.enregistrer')->middleware('auth');
    Route::get('produits/{produit}/modifier', [AdminProduitController::class, 'modifier'])->name('produits.modifier')->middleware('auth');
    Route::put('produits/{produit}', [AdminProduitController::class, 'mettreAJour'])->name('produits.mettre-a-jour')->middleware('auth');
    Route::delete('produits/{produit}', [AdminProduitController::class, 'supprimer'])->name('produits.supprimer')->middleware('auth');
});

// Routes Favoris
Route::get('/favoris', [FavorisController::class, 'index'])->name('favoris.index');
Route::post('/favoris/{produitId}', [FavorisController::class, 'ajouter'])->name('favoris.ajouter');
Route::delete('/favoris/{produitId}', [FavorisController::class, 'retirer'])->name('favoris.retirer');