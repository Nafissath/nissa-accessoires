<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function index()
    {
        $favorisIds = session('favoris', []);
        
        $produits = Produit::with(['categorie', 'images'])
            ->whereIn('id', $favorisIds)
            ->where('est_actif', true)
            ->get();

        return view('favoris.index', [
            'produits' => $produits,
            'total' => count($favorisIds),
        ]);
    }

    public function ajouter($produitId)
    {
        $favoris = session('favoris', []);
        
        if (!in_array($produitId, $favoris)) {
            $favoris[] = $produitId;
            session(['favoris' => $favoris]);
        }

        return back()->with('succes', 'Ajouté aux favoris ❤️');
    }

    public function retirer($produitId)
    {
        $favoris = session('favoris', []);
        $favoris = array_diff($favoris, [$produitId]);
        session(['favoris' => array_values($favoris)]);

        return back()->with('succes', 'Retiré des favoris');
    }
}