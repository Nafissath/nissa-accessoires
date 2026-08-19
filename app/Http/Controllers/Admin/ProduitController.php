<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Collection;
use App\Models\ImageProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $query = Produit::with(['categorie', 'collection', 'images']);

        if ($request->filled('recherche')) {
            $r = $request->recherche;
            $query->where('nom', 'LIKE', "%{$r}%");
        }

        if ($request->filled('categorie')) {
            $query->where('categorie_id', $request->categorie);
        }

        if ($request->filled('statut')) {
            $query->where('est_actif', $request->statut === 'actif');
        }

        if ($request->filled('badge')) {
            $query->where('badge', $request->badge);
        }

        $produits = $query->latest()->paginate(20)->withQueryString();
        $categories = Categorie::orderBy('nom')->get();

        return view('admin.produits.index', compact('produits', 'categories'));
    }

    public function creer()
    {
        $categories = Categorie::where('actif', true)->get();
        $collections = Collection::where('actif', true)->get();

        return view('admin.produits.creer', compact('categories', 'collections'));
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description_courte' => 'nullable|string',
            'description_longue' => 'nullable|string',
            'prix_base' => 'required|integer|min:0',
            'prix_promo' => 'nullable|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $produit = Produit::create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom) . '-' . uniqid(),
            'description_courte' => $request->description_courte,
            'description_longue' => $request->description_longue,
            'prix_base' => $request->prix_base,
            'prix_promo' => $request->prix_promo,
            'categorie_id' => $request->categorie_id,
            'collection_id' => $request->collection_id,
            'badge' => $request->badge,
            'est_actif' => $request->has('est_actif'),
            'est_en_avant' => $request->has('est_en_avant'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('produits', 'public');
                
                ImageProduit::create([
                    'produit_id' => $produit->id,
                    'chemin' => $path,
                    'est_principale' => $index === 0,
                ]);
            }
        }

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit créé avec succès !');
    }

    public function modifier(Produit $produit)
    {
        $categories = Categorie::where('actif', true)->get();
        $collections = Collection::where('actif', true)->get();

        return view('admin.produits.modifier', compact('produit', 'categories', 'collections'));
    }

    public function mettreAJour(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix_base' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $produit->update([
            'nom' => $request->nom,
            'description_courte' => $request->description_courte,
            'description_longue' => $request->description_longue,
            'prix_base' => $request->prix_base,
            'prix_promo' => $request->prix_promo,
            'categorie_id' => $request->categorie_id,
            'collection_id' => $request->collection_id,
            'badge' => $request->badge,
            'est_actif' => $request->has('est_actif'),
            'est_en_avant' => $request->has('est_en_avant'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('produits', 'public');
                
                ImageProduit::create([
                    'produit_id' => $produit->id,
                    'chemin' => $path,
                    'est_principale' => $produit->images()->count() === 0,
                ]);
            }
        }

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit mis à jour avec succès !');
    }

    public function supprimer(Produit $produit)
    {
        foreach ($produit->images as $image) {
            Storage::disk('public')->delete($image->chemin);
        }
        
        $produit->delete();

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit supprimé avec succès !');
    }

    public function supprimerImage($imageId)
    {
        $image = ImageProduit::findOrFail($imageId);
        Storage::disk('public')->delete($image->chemin);
        $image->delete();

        return back()->with('success', 'Image supprimée');
    }

    public function imagePrincipale($imageId)
    {
        $image = ImageProduit::findOrFail($imageId);
        
        ImageProduit::where('produit_id', $image->produit_id)
            ->update(['est_principale' => false]);
        
        $image->update(['est_principale' => true]);

        return back()->with('success', 'Image principale mise à jour');
    }
}