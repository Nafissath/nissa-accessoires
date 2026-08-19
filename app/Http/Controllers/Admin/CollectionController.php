<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::withCount('produits')->latest()->paginate(20);
        return view('admin.collections.index', compact('collections'));
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:collections,nom',
            'description' => 'nullable|string',
        ]);

        Collection::create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom),
            'description' => $request->description,
            'actif' => true,
        ]);

        return back()->with('success', 'Collection créée !');
    }

    public function supprimer(Collection $collection)
    {
        if ($collection->produits()->count() > 0) {
            return back()->withErrors(['Cette collection contient des produits.']);
        }
        
        $collection->delete();
        return back()->with('success', 'Collection supprimée !');
    }

    public function toggleActif(Collection $collection)
    {
        $collection->update(['actif' => !$collection->actif]);
        return back()->with('success', 'Statut mis à jour !');
    }
}