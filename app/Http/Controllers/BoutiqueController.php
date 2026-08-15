<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Cible;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index(Request $request)
    {
        $query = Produit::where('est_actif', true);

        // Filtres
        if ($request->has('categorie')) {
            $query->whereHas('categorie', function ($q) use ($request) {
                $q->where('slug', $request->categorie);
            });
        }

        if ($request->has('matiere')) {
            $query->whereHas('variantes.matiere', function ($q) use ($request) {
                $q->where('slug', $request->matiere);
            });
        }

        if ($request->has('prix_min')) {
            $query->where('prix_base', '>=', $request->prix_min);
        }

        if ($request->has('prix_max')) {
            $query->where('prix_base', '<=', $request->prix_max);
        }

        $produits = $query->with(['images', 'variantes'])->paginate(12);
        $categories = Categorie::where('actif', true)->get();

        return view('boutique.index', [
            'produits' => $produits,
            'categories' => $categories,
        ]);
    }

    public function categorie($slug)
    {
        $categorie = Categorie::where('slug', $slug)->where('actif', true)->firstOrFail();

        $produits = Produit::where('categorie_id', $categorie->id)
            ->where('est_actif', true)
            ->with(['images', 'variantes'])
            ->paginate(12);

        return view('boutique.index', [
            'produits' => $produits,
            'categorie' => $categorie,
        ]);
    }

    public function cible($slug)
    {
        $cible = Cible::where('slug', $slug)->where('actif', true)->firstOrFail();

        $produits = $cible->produits()
            ->where('est_actif', true)
            ->with(['images', 'variantes'])
            ->paginate(12);

        return view('boutique.index', [
            'produits' => $produits,
            'cible' => $cible,
        ]);
    }
}