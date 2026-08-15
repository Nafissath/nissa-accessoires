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
                'collection',
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

        return view('produit.afficher', [
            'produit' => $produit,
            'produitsSimilaires' => $produitsSimilaires,
        ]);
    }
}