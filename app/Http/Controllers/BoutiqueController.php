<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Matiere;
use App\Models\Couleur;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index(Request $request)
    {
        $query = Produit::where('est_actif', true)->with(['categorie', 'images', 'variantes']);

        // Filtre par catégorie
        if ($request->filled('categorie')) {
            $query->whereHas('categorie', function ($q) use ($request) {
                $q->where('slug', $request->categorie);
            });
        }

        // Filtre par matière
        if ($request->filled('matiere')) {
            $query->whereHas('variantes.matiere', function ($q) use ($request) {
                $q->where('slug', $request->matiere);
            });
        }

        // Filtre par couleur
        if ($request->filled('couleur')) {
            $query->whereHas('variantes.couleur', function ($q) use ($request) {
                $q->where('slug', $request->couleur);
            });
        }

        // Filtre par prix
        if ($request->filled('prix_max')) {
            $query->where('prix_base', '<=', $request->prix_max);
        }

        // Tri
        $tri = $request->input('tri', 'recent');
        switch ($tri) {
            case 'prix_asc':
                $query->orderBy('prix_base', 'asc');
                break;
            case 'prix_desc':
                $query->orderBy('prix_base', 'desc');
                break;
            case 'nom':
                $query->orderBy('nom', 'asc');
                break;
            default:
                $query->latest();
        }

        $produits = $query->paginate(12)->withQueryString();
        
        $categories = Categorie::where('actif', true)->get();
        $matieres = Matiere::where('actif', true)->get();
        $couleurs = Couleur::where('actif', true)->get();
        
        $categorieActive = $request->categorie ? Categorie::where('slug', $request->categorie)->first() : null;

        return view('boutique.index', compact(
            'produits', 'categories', 'matieres', 'couleurs', 'categorieActive'
        ));
    }

    public function categorie($slug)
    {
        return redirect()->route('boutique', ['categorie' => $slug]);
    }
}