<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        // On utilisera la session pour le panier au début
        $panier = session('panier', []);

        return view('panier.index', [
            'panier' => $panier,
        ]);
    }

    public function ajouter(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'variante_id' => 'nullable|exists:variantes_produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $panier = session('panier', []);

        $cle = $request->produit_id . '-' . ($request->variante_id ?? 'defaut');

        if (isset($panier[$cle])) {
            $panier[$cle]['quantite'] += $request->quantite;
        } else {
            $panier[$cle] = [
                'produit_id' => $request->produit_id,
                'variante_id' => $request->variante_id,
                'quantite' => $request->quantite,
            ];
        }

        session(['panier' => $panier]);

        return redirect()->route('panier.index')->with('succes', 'Produit ajouté au panier !');
    }

    public function modifier(Request $request, $cle)
    {
        $request->validate([
            'quantite' => 'required|integer|min:1',
        ]);

        $panier = session('panier', []);

        if (isset($panier[$cle])) {
            $panier[$cle]['quantite'] = $request->quantite;
            session(['panier' => $panier]);
        }

        return redirect()->route('panier.index')->with('succes', 'Panier mis à jour !');
    }

    public function supprimer($cle)
    {
        $panier = session('panier', []);

        if (isset($panier[$cle])) {
            unset($panier[$cle]);
            session(['panier' => $panier]);
        }

        return redirect()->route('panier.index')->with('succes', 'Produit supprimé du panier !');
    }
}