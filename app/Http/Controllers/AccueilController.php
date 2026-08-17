<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Collection;

class AccueilController extends Controller
{
    public function index()
    {
        // Prendre les 4 DERNIERS produits ajoutés (logique pour le badge "Nouveau")
        $produitsEnAvant = Produit::where('est_actif', true)
            ->with(['categorie', 'images', 'variantes'])
            ->latest() // Tri par date de création, les plus récents en premier
            ->limit(4)
            ->get();

        $collections = Collection::where('actif', true)->limit(4)->get();

        return view('accueil.index', [
            'produitsEnAvant' => $produitsEnAvant,
            'collections' => $collections,
        ]);
    }
}