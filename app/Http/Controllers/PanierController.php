<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Produit;

class PanierController extends Controller
{
    public function index()
    {
        $panier = session('panier', []);
        return view('panier.index', compact('panier'));
    }

    public function ajouter(Request $request)
    {
        $request->validate([
            'produit_id' => 'required_without:pack_id|exists:produits,id',
            'pack_id'    => 'required_without:produit_id|exists:packs,id',
            'variante_id'=> 'nullable|exists:variantes_produits,id',
            'quantite'   => 'required|integer|min:1',
        ]);

        $panier = session('panier', []);
        $message = '';

        // ============================================
        // CAS 1 : Ajout d'un PACK (stocké comme 1 entrée)
        // ============================================
        if ($request->filled('pack_id')) {
            $pack = Pack::findOrFail($request->pack_id);
            $cle = 'pack-' . $pack->id;

            // Prix du pack (promo si existe, sinon base)
            $prixPack = $pack->prix_promo ?? $pack->prix_base;

            if (isset($panier[$cle])) {
                $panier[$cle]['quantite'] += $request->quantite;
            } else {
                $panier[$cle] = [
                    'type'       => 'pack',
                    'pack_id'    => $pack->id,
                    'pack_nom'   => $pack->nom,
                    'quantite'   => $request->quantite,
                    'prix_unitaire' => $prixPack,
                ];
            }

            $message = 'Pack "' . $pack->nom . '" ajouté au panier !';
        }
        // ============================================
        // CAS 2 : Ajout d'un PRODUIT simple
        // ============================================
        else {
            $cle = 'produit-' . $request->produit_id . '-' . ($request->variante_id ?? 'defaut');

            if (isset($panier[$cle])) {
                $panier[$cle]['quantite'] += $request->quantite;
            } else {
                $panier[$cle] = [
                    'type'        => 'produit',
                    'produit_id'  => $request->produit_id,
                    'variante_id' => $request->variante_id,
                    'quantite'    => $request->quantite,
                ];
            }

            $produit = Produit::find($request->produit_id);
            $message = $produit->nom . ' ajouté au panier !';
        }

        session(['panier' => $panier]);
        return redirect()->route('panier.index')->with('succes', $message);
    }

    public function modifier(Request $request, $cle)
    {
        $request->validate(['quantite' => 'required|integer|min:1']);
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
        return redirect()->route('panier.index')->with('succes', 'Article supprimé du panier !');
    }
}