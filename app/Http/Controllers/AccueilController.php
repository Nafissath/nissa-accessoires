<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Collection;

class AccueilController extends Controller
{
    public function index()
    {
        $produitsEnAvant = Produit::where('est_actif', true)
            ->where('est_en_avant', true)
            ->with(['images', 'variantes'])
            ->limit(8)
            ->get();

        $collections = Collection::where('actif', true)->limit(4)->get();

        return view('accueil.index', [
            'produitsEnAvant' => $produitsEnAvant,
            'collections' => $collections,
        ]);
    }
}