<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use App\Models\Produit;
use App\Models\ArticlePack;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PackController extends Controller
{
    public function index()
    {
        $packs = Pack::with('articles.produit')
            ->withCount('articles')
            ->latest()
            ->paginate(20);
        
        return view('admin.packs.index', compact('packs'));
    }

    public function creer()
    {
        $produits = Produit::where('est_actif', true)
            ->with('images')
            ->get();
        
        return view('admin.packs.creer', compact('produits'));
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix_base' => 'required|integer|min:0',
            'prix_promo' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'articles' => 'required|array|min:1',
            'articles.*.produit_id' => 'required|exists:produits,id',
            'articles.*.quantite' => 'required|integer|min:1',
        ]);

        // Upload image si fournie
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('packs', 'public');
        }

        $pack = Pack::create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom) . '-' . uniqid(),
            'description' => $request->description,
            'prix_base' => $request->prix_base,
            'prix_promo' => $request->prix_promo,
            'image' => $imagePath,
            'actif' => $request->has('actif'),  // ⚠️ 'actif' et non 'est_actif'
        ]);

        // Ajouter les articles au pack
        foreach ($request->articles as $article) {
            ArticlePack::create([
                'pack_id' => $pack->id,
                'produit_id' => $article['produit_id'],
                'quantite' => $article['quantite'],
            ]);
        }

        return redirect()->route('admin.packs.index')
            ->with('success', 'Pack créé avec succès !');
    }

    public function modifier(Pack $pack)
    {
        $pack->load('articles.produit');
        $produits = Produit::where('est_actif', true)->with('images')->get();
        
        return view('admin.packs.modifier', compact('pack', 'produits'));
    }

    public function mettreAJour(Request $request, Pack $pack)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix_base' => 'required|integer|min:0',
            'articles' => 'required|array|min:1',
        ]);

        // Upload nouvelle image si fournie
        if ($request->hasFile('image')) {
            if ($pack->image) {
                Storage::disk('public')->delete($pack->image);
            }
            $imagePath = $request->file('image')->store('packs', 'public');
            $pack->image = $imagePath;
        }

        $pack->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix_base' => $request->prix_base,
            'prix_promo' => $request->prix_promo,
            'actif' => $request->has('actif'),  // ⚠️ 'actif' et non 'est_actif'
        ]);

        // Supprimer anciens articles et recréer
        $pack->articles()->delete();
        foreach ($request->articles as $article) {
            ArticlePack::create([
                'pack_id' => $pack->id,
                'produit_id' => $article['produit_id'],
                'quantite' => $article['quantite'],
            ]);
        }

        return redirect()->route('admin.packs.index')
            ->with('success', 'Pack mis à jour !');
    }

    public function supprimer(Pack $pack)
    {
        if ($pack->image) {
            Storage::disk('public')->delete($pack->image);
        }
        $pack->delete();
        
        return redirect()->route('admin.packs.index')
            ->with('success', 'Pack supprimé !');
    }
}