<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Produit;
use App\Models\VarianteProduit;

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
            'produit_id'  => 'required_without:pack_id|exists:produits,id',
            'pack_id'     => 'required_without:produit_id|exists:packs,id',
            'variante_id' => 'nullable|exists:variantes_produits,id',
            'quantite'    => 'required|integer|min:1',
        ]);

        $panier = session('panier', []);

        // CAS 1 : Ajout d'un PACK
        if ($request->filled('pack_id')) {
            $pack = Pack::findOrFail($request->pack_id);
            $cle = 'pack-' . $pack->id;
            $prixPack = $pack->prix_promo ?? $pack->prix_base;

            $quantiteActuelle = $panier[$cle]['quantite'] ?? 0;
            $nouvelleQuantite = $quantiteActuelle + $request->quantite;

            // Vérification du stock de chaque produit contenu dans le pack
            foreach ($pack->articles as $pa) {
                $variante = $this->varianteParDefaut($pa->produit);
                if ($variante) {
                    $besoin = $pa->quantite * $nouvelleQuantite;
                    if ($variante->stock < $besoin) {
                        return back()->with('erreur', "Stock insuffisant pour {$pa->produit->nom} (disponible : {$variante->stock}).");
                    }
                }
            }

            if (isset($panier[$cle])) {
                $panier[$cle]['quantite'] = $nouvelleQuantite;
            } else {
                $panier[$cle] = [
                    'type'          => 'pack',
                    'pack_id'       => $pack->id,
                    'pack_nom'      => $pack->nom,
                    'quantite'      => $request->quantite,
                    'prix_unitaire' => $prixPack,
                ];
            }

            $message = 'Pack "' . $pack->nom . '" ajouté au panier !';
        }
        // CAS 2 : Ajout d'un PRODUIT
        else {
            $produit = Produit::find($request->produit_id);
            if (!$produit) {
                return back()->with('erreur', 'Produit introuvable.');
            }

            $variante = $request->filled('variante_id')
                ? VarianteProduit::find($request->variante_id)
                : $this->varianteParDefaut($produit);

            $stockDispo = $variante ? $variante->stock : 10;

            $cle = 'produit-' . $produit->id . '-' . ($request->variante_id ?? 'defaut');
            $quantiteActuelle = $panier[$cle]['quantite'] ?? 0;
            $nouvelleQuantite = $quantiteActuelle + $request->quantite;

            // Blocage si la quantité dépasse le stock disponible
            if ($nouvelleQuantite > $stockDispo) {
                $restant = max(0, $stockDispo - $quantiteActuelle);
                if ($restant === 0) {
                    return back()->with('erreur', $produit->nom . ' est déjà dans votre panier en quantité maximale.');
                }
                return back()->with('erreur', "Stock limité pour {$produit->nom} : il reste {$restant} unité(s) disponible(s).");
            }

            if (isset($panier[$cle])) {
                $panier[$cle]['quantite'] = $nouvelleQuantite;
            } else {
                $panier[$cle] = [
                    'type'        => 'produit',
                    'produit_id'  => $produit->id,
                    'variante_id' => $request->variante_id,
                    'quantite'    => $request->quantite,
                ];
            }

            $message = $produit->nom . ' ajouté au panier !';
        }

        session(['panier' => $panier]);

        return back()->with('succes', $message);
    }

    public function modifier(Request $request, $cle)
    {
        $request->validate(['quantite' => 'required|integer|min:1']);

        $panier = session('panier', []);

        if (isset($panier[$cle])) {
            $quantiteDemandee = (int) $request->quantite;

            // Vérification du stock lors du changement de quantité
            if (($panier[$cle]['type'] ?? 'produit') === 'pack') {
                $pack = Pack::find($panier[$cle]['pack_id'] ?? null);
                if ($pack) {
                    foreach ($pack->articles as $pa) {
                        $variante = $this->varianteParDefaut($pa->produit);
                        if ($variante && $variante->stock < $pa->quantite * $quantiteDemandee) {
                            return redirect()->route('panier.index')
                                ->with('erreur', "Stock insuffisant pour {$pa->produit->nom} (disponible : {$variante->stock}).");
                        }
                    }
                }
            } else {
                $produit = Produit::find($panier[$cle]['produit_id'] ?? null);
                $variante = !empty($panier[$cle]['variante_id'])
                    ? VarianteProduit::find($panier[$cle]['variante_id'])
                    : $this->varianteParDefaut($produit);

                $stockDispo = $variante ? $variante->stock : 10;

                if ($produit && $quantiteDemandee > $stockDispo) {
                    return redirect()->route('panier.index')
                        ->with('erreur', "Stock limité pour {$produit->nom} : maximum {$stockDispo} unité(s).");
                }
            }

            $panier[$cle]['quantite'] = $quantiteDemandee;
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

    /**
     * Retourne la variante par défaut d'un produit (ou la première)
     */
    private function varianteParDefaut(?Produit $produit): ?VarianteProduit
    {
        if (!$produit) {
            return null;
        }

        return $produit->variantes->firstWhere('par_defaut', true)
            ?? $produit->variantes->first();
    }
}