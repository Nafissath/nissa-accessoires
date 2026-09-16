<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Collection;

class AccueilController extends Controller
{
    public function index()
    {
        // Prendre les 4 derniers produits actifs (badge "Nouveau")
        $produitsEnAvant = Produit::where('est_actif', true)
            ->with([
                'categorie',
                'images',
                'variantes.couleur',
                'variantes.taille',
                'variantes.matiere'
            ])
            ->latest()
            ->take(4)
            ->get();

        $collections = Collection::where('actif', true)->limit(4)->get();

        return view('accueil.index', [
            'produitsEnAvant' => $produitsEnAvant,
            'collections' => $collections,
        ]);
    }
}