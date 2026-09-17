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
use App\Http\Controllers\Admin\CommandeController as AdminCommandeController;
use App\Http\Controllers\FavorisController;

// ============================================
// ROUTE LOGIN PAR DÉFAUT
// ============================================
Route::get('/login', function () {
    return redirect('/admin/connexion');
})->name('login');

// ============================================
// ROUTES PUBLIQUES
// ============================================
Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::get('/boutique', [BoutiqueController::class, 'index'])->name('boutique');
Route::get('/categorie/{slug}', [BoutiqueController::class, 'categorie'])->name('categorie');
Route::get('/cible/{slug}', [BoutiqueController::class, 'cible'])->name('cible');

// ✅ RECHERCHE (AJOUTÉE ICI)
Route::get('/recherche', [BoutiqueController::class, 'recherche'])->name('recherche');

Route::get('/produit/{slug}', [ProduitController::class, 'afficher'])->name('produit.afficher');

Route::get('/packs', [PackController::class, 'index'])->name('packs.index');
Route::get('/pack/{slug}', [PackController::class, 'afficher'])->name('packs.afficher');

// Pages
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('pages.a-propos');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/faq', [PageController::class, 'faq'])->name('pages.faq');

// Pages légales
Route::get('/mentions-legales', [PageController::class, 'mentionsLegales'])->name('pages.mentions-legales');
Route::get('/cgv', [PageController::class, 'cgv'])->name('pages.cgv');
Route::get('/politique-confidentialite', [PageController::class, 'politiqueConfidentialite'])->name('pages.politique-confidentialite');
Route::get('/politique-retours', [PageController::class, 'politiqueRetours'])->name('pages.politique-retours');
Route::get('/livraison', [PageController::class, 'livraison'])->name('pages.livraison');

Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);

// Newsletter
Route::post('/newsletter', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/desinscription/{token}', [App\Http\Controllers\NewsletterController::class, 'desinscription'])->name('newsletter.desinscription');

// Panier
Route::prefix('panier')->group(function () {
    Route::get('/', [PanierController::class, 'index'])->name('panier.index');
    Route::post('/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::patch('/modifier/{article}', [PanierController::class, 'modifier'])->name('panier.modifier');
    Route::delete('/supprimer/{article}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
});

// Commandes
Route::prefix('commande')->group(function () {
    Route::get('/', [CommandeController::class, 'index'])->name('commande.index');
    Route::post('/', [CommandeController::class, 'enregistrer'])->name('commande.enregistrer');
    Route::get('/confirmation/{commande}', [CommandeController::class, 'confirmation'])->name('commande.confirmation');
    Route::get('/{commande}/paiement/retour', [CommandeController::class, 'retourPaiement'])->name('commande.paiement.retour');
});

// Favoris
Route::get('/favoris', [FavorisController::class, 'index'])->name('favoris.index');
Route::post('/favoris/{produitId}', [FavorisController::class, 'ajouter'])->name('favoris.ajouter');
Route::delete('/favoris/{produitId}', [FavorisController::class, 'retirer'])->name('favoris.retirer');

// ============================================
// ROUTES ADMIN - Authentification (publiques)
// ============================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('connexion', [AuthController::class, 'afficherFormulaireConnexion'])->name('connexion');
    Route::post('connexion', [AuthController::class, 'connecter'])->name('connecter');
    Route::post('deconnexion', [AuthController::class, 'deconnecter'])->name('deconnexion');
});

// ============================================
// ROUTES ADMIN - Protégées
// ============================================
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Dashboard
    Route::get('/', [TableauDeBordController::class, 'index'])->name('tableau-de-bord');

    // Produits
    Route::get('produits', [AdminProduitController::class, 'index'])->name('produits.index');
    Route::get('produits/creer', [AdminProduitController::class, 'creer'])->name('produits.creer');
    Route::post('produits', [AdminProduitController::class, 'enregistrer'])->name('produits.enregistrer');
    Route::get('produits/{produit}/modifier', [AdminProduitController::class, 'modifier'])->name('produits.modifier');
    Route::put('produits/{produit}', [AdminProduitController::class, 'mettreAJour'])->name('produits.mettre-a-jour');
    Route::delete('produits/{produit}', [AdminProduitController::class, 'supprimer'])->name('produits.supprimer');

    // Commandes
    Route::get('commandes', [AdminCommandeController::class, 'index'])->name('commandes.index');
    Route::get('commandes/{commande}', [AdminCommandeController::class, 'show'])->name('commandes.show');
    Route::patch('commandes/{commande}/statut', [AdminCommandeController::class, 'updateStatut'])->name('commandes.updateStatut');

    // Images produits
    Route::delete('images/{image}', [\App\Http\Controllers\Admin\ProduitController::class, 'supprimerImage'])->name('images.supprimer');
    Route::patch('images/{image}/principale', [\App\Http\Controllers\Admin\ProduitController::class, 'imagePrincipale'])->name('images.principale');

    Route::post('produits/{produit}/variantes', [\App\Http\Controllers\Admin\ProduitController::class, 'ajouterVariante'])->name('produits.ajouterVariante');
    Route::delete('variantes/{variante}', [\App\Http\Controllers\Admin\ProduitController::class, 'supprimerVariante'])->name('variantes.supprimer');

    // Catégories
    Route::get('categories', [\App\Http\Controllers\Admin\CategorieController::class, 'index'])->name('categories.index');
    Route::post('categories', [\App\Http\Controllers\Admin\CategorieController::class, 'enregistrer'])->name('categories.enregistrer');
    Route::delete('categories/{categorie}', [\App\Http\Controllers\Admin\CategorieController::class, 'supprimer'])->name('categories.supprimer');
    Route::patch('categories/{categorie}/toggle', [\App\Http\Controllers\Admin\CategorieController::class, 'toggleActif'])->name('categories.toggleActif');

    // Collections
    Route::get('collections', [\App\Http\Controllers\Admin\CollectionController::class, 'index'])->name('collections.index');
    Route::post('collections', [\App\Http\Controllers\Admin\CollectionController::class, 'enregistrer'])->name('collections.enregistrer');
    Route::delete('collections/{collection}', [\App\Http\Controllers\Admin\CollectionController::class, 'supprimer'])->name('collections.supprimer');
    Route::patch('collections/{collection}/toggle', [\App\Http\Controllers\Admin\CollectionController::class, 'toggleActif'])->name('collections.toggleActif');

    // Packs
    Route::get('packs', [\App\Http\Controllers\Admin\PackController::class, 'index'])->name('packs.index');
    Route::get('packs/creer', [\App\Http\Controllers\Admin\PackController::class, 'creer'])->name('packs.creer');
    Route::post('packs', [\App\Http\Controllers\Admin\PackController::class, 'enregistrer'])->name('packs.enregistrer');
    Route::get('packs/{pack}/modifier', [\App\Http\Controllers\Admin\PackController::class, 'modifier'])->name('packs.modifier');
    Route::put('packs/{pack}', [\App\Http\Controllers\Admin\PackController::class, 'mettreAJour'])->name('packs.mettre-a-jour');
    Route::delete('packs/{pack}', [\App\Http\Controllers\Admin\PackController::class, 'supprimer'])->name('packs.supprimer');

    // Clientes
    Route::get('clientes', [\App\Http\Controllers\Admin\ClienteController::class, 'index'])->name('clientes.index');
    Route::get('clientes/{cliente}', [\App\Http\Controllers\Admin\ClienteController::class, 'show'])->name('clientes.show');

    // Attributs
    Route::get('attributs', [\App\Http\Controllers\Admin\AttributController::class, 'index'])->name('attributs.index');
    Route::post('attributs', [\App\Http\Controllers\Admin\AttributController::class, 'enregistrer'])->name('attributs.enregistrer');
    Route::delete('attributs/{type}/{id}', [\App\Http\Controllers\Admin\AttributController::class, 'supprimer'])->name('attributs.supprimer');
    Route::patch('attributs/{type}/{id}/toggle', [\App\Http\Controllers\Admin\AttributController::class, 'toggle'])->name('attributs.toggle');

    // Paramètres
    Route::get('parametres', [\App\Http\Controllers\Admin\ParametreController::class, 'index'])->name('parametres.index');
    Route::put('parametres', [\App\Http\Controllers\Admin\ParametreController::class, 'update'])->name('parametres.update');

    // Newsletter 
    Route::get('newsletter', [\App\Http\Controllers\Admin\NewsletterController::class, 'index'])->name('newsletter.index');
    Route::get('newsletter/creer', [\App\Http\Controllers\Admin\NewsletterController::class, 'creer'])->name('newsletter.creer');
    Route::post('newsletter/envoyer', [\App\Http\Controllers\Admin\NewsletterController::class, 'envoyer'])->name('newsletter.envoyer');
    Route::patch('newsletter/{abonne}/toggle', [\App\Http\Controllers\Admin\NewsletterController::class, 'toggle'])->name('newsletter.toggle');
    Route::delete('newsletter/{abonne}', [\App\Http\Controllers\Admin\NewsletterController::class, 'supprimer'])->name('newsletter.supprimer');
    Route::delete('newsletter/historique/{envoi}', [\App\Http\Controllers\Admin\NewsletterController::class, 'supprimerEnvoi'])->name('newsletter.supprimerEnvoi');
    Route::get('newsletter/export', [\App\Http\Controllers\Admin\NewsletterController::class, 'export'])->name('newsletter.export');
});