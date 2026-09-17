<?php

namespace App\Http\Controllers;

use App\Models\Produit;

class ProduitController extends Controller
{
    public function afficher($slug)
    {
        $produit = Produit::where('slug', $slug)
            ->where('est_actif', true)
            ->with([
                'categorie',
                'images',
                'variantes.matiere',
                'variantes.couleur',
                'variantes.taille',
            ])
            ->firstOrFail();

        $produitsSimilaires = Produit::where('categorie_id', $produit->categorie_id)
            ->where('id', '!=', $produit->id)
            ->where('est_actif', true)
            ->with('images')
            ->limit(4)
            ->get();

        // Grouper les variantes par type pour les sélecteurs
        $couleursDisponibles = $produit->variantes->pluck('couleur')->filter()->unique('id');
        $taillesDisponibles = $produit->variantes->pluck('taille')->filter()->unique('id');
        $matieresDisponibles = $produit->variantes->pluck('matiere')->filter()->unique('id');
        $avis = $produit->avis()->where('est_approuve', true)->latest()->get();

        return view('produit.afficher', compact(
            'produit',
            'produitsSimilaires',
            'couleursDisponibles',
            'taillesDisponibles',
            'matieresDisponibles',
            'avis'
        ));
    }
}