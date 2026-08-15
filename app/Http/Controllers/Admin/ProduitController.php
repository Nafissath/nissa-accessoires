<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with(['categorie', 'collection', 'images'])
            ->latest()
            ->paginate(20);

        return view('admin.produits.index', [
            'produits' => $produits,
        ]);
    }

    public function creer()
    {
        $categories = Categorie::where('actif', true)->get();
        $collections = Collection::where('actif', true)->get();

        return view('admin.produits.creer', [
            'categories' => $categories,
            'collections' => $collections,
        ]);
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description_courte' => 'nullable|string',
            'description_longue' => 'nullable|string',
            'prix_base' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $produit = Produit::create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom),
            'description_courte' => $request->description_courte,
            'description_longue' => $request->description_longue,
            'prix_base' => $request->prix_base,
            'prix_promo' => $request->prix_promo,
            'categorie_id' => $request->categorie_id,
            'collection_id' => $request->collection_id,
            'est_actif' => $request->has('est_actif'),
            'est_en_avant' => $request->has('est_en_avant'),
        ]);

        return redirect()->route('admin.produits.index')
            ->with('succes', 'Produit créé avec succès !');
    }

    public function modifier(Produit $produit)
    {
        $categories = Categorie::where('actif', true)->get();
        $collections = Collection::where('actif', true)->get();

        return view('admin.produits.modifier', [
            'produit' => $produit,
            'categories' => $categories,
            'collections' => $collections,
        ]);
    }

    public function mettreAJour(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix_base' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $produit->update([
            'nom' => $request->nom,
            'description_courte' => $request->description_courte,
            'description_longue' => $request->description_longue,
            'prix_base' => $request->prix_base,
            'prix_promo' => $request->prix_promo,
            'categorie_id' => $request->categorie_id,
            'collection_id' => $request->collection_id,
            'est_actif' => $request->has('est_actif'),
            'est_en_avant' => $request->has('est_en_avant'),
        ]);

        return redirect()->route('admin.produits.index')
            ->with('succes', 'Produit mis à jour avec succès !');
    }

    public function supprimer(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('admin.produits.index')
            ->with('succes', 'Produit supprimé avec succès !');
    }
}