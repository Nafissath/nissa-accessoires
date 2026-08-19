<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::withCount('produits')->latest()->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:categories,nom',
        ]);

        Categorie::create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom),
            'actif' => true,
        ]);

        return back()->with('success', 'Catégorie créée !');
    }

    public function supprimer(Categorie $categorie)
    {
        if ($categorie->produits()->count() > 0) {
            return back()->withErrors(['Cette catégorie contient ' . $categorie->produits()->count() . ' produits et ne peut pas être supprimée.']);
        }
        
        $categorie->delete();
        return back()->with('success', 'Catégorie supprimée !');
    }

    public function toggleActif(Categorie $categorie)
    {
        $categorie->update(['actif' => !$categorie->actif]);
        return back()->with('success', 'Statut mis à jour !');
    }
}