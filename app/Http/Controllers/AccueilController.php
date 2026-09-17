<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Collection;

class AccueilController extends Controller
{
    public function index()
    {
        $produitsEnAvant = Produit::where('est_actif', true)
            ->with(['categorie', 'images', 'variantes.couleur', 'variantes.taille', 'variantes.matiere'])
            ->latest()
            ->take(4)
            ->get();

        //  Collections actives avec leur premier produit (pour avoir une image)
        $collections = Collection::where('actif', true)
            ->with(['produits' => function ($query) {
                $query->where('est_actif', true)
                    ->with('images')
                    ->limit(1);
            }])
            ->limit(3)
            ->get();

        return view('accueil.index', compact('produitsEnAvant', 'collections'));
    }
}