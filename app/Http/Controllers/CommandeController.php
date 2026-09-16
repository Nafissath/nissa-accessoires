<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Commande;
use App\Models\Cliente;
use App\Models\ArticleCommande;
use App\Models\Produit;
use App\Models\VarianteProduit;
use App\Models\Pack;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationCommande;
use App\Mail\NouvelleCommandeAdmin;

class CommandeController extends Controller
{
    public function index()
    {
        $panier = session('panier', []);

        if (empty($panier)) {
            return redirect()->route('boutique')->with('erreur', 'Votre panier est vide !');
        }

        return view('commande.index', ['panier' => $panier]);
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'prenom'       => 'required|string|max:255',
            'nom'          => 'required|string|max:255',
            'telephone'    => 'required|string|max:20',
            'whatsapp'     => 'required|string|max:20',
            'adresse'      => 'required|string',
            'email'        => 'nullable|email|max:255',
            'instructions' => 'nullable|string',
        ]);

        $panier = session('panier', []);

        if (empty($panier)) {
            return redirect()->route('boutique')->with('erreur', 'Votre panier est vide !');
        }

        // 1. Calcul du total
        $sousTotal = 0;
        foreach ($panier as $item) {
            if (($item['type'] ?? null) === 'pack') {
                $pack = Pack::find($item['pack_id']);
                if ($pack) {
                    $prix = $item['prix_unitaire'] ?? ($pack->prix_promo ?? $pack->prix_base);
                    $sousTotal += $prix * $item['quantite'];
                }
            } else {
                $produit = Produit::find($item['produit_id'] ?? null);
                if ($produit) {
                    $variante = !empty($item['variante_id']) ? VarianteProduit::find($item['variante_id']) : null;
                    $prix = $variante && $variante->prix ? $variante->prix : $produit->prix_base;
                    $sousTotal += $prix * $item['quantite'];
                }
            }
        }

        // 2. Création ou mise à jour de la cliente
        $cliente = Cliente::updateOrCreate(
            ['telephone' => $request->telephone],
            [
                'prenom'   => $request->prenom,
                'nom'      => $request->nom,
                'whatsapp' => $request->whatsapp,
                'email'    => $request->email ?? null,
                'adresse'  => $request->adresse,
            ]
        );

        // 3. Création de la commande
        $commande = Commande::create([
            'numero_commande'  => 'NIS-' . strtoupper(substr(uniqid(), -6)),
            'cliente_id'       => $cliente->id,
            'sous_total'       => $sousTotal,
            'frais_livraison'  => 0,
            'total'            => $sousTotal,
            'statut'           => 'en_attente',
            'methode_paiement' => 'mobile_money',
            'statut_paiement'  => 'non_paye',
            'adresse'          => $request->adresse,
            'instructions'     => $request->instructions,
            'telephone'        => $request->telephone,
            'whatsapp'         => $request->whatsapp,
            'date_commande'    => now(),
        ]);

        // 4. Ajout des articles
        foreach ($panier as $item) {
            if (($item['type'] ?? null) === 'pack') {
                $pack = Pack::find($item['pack_id']);
                if (!$pack) {
                    continue;
                }

                $prix = $item['prix_unitaire'] ?? ($pack->prix_promo ?? $pack->prix_base);

                ArticleCommande::create([
                    'commande_id'   => $commande->id,
                    'pack_id'       => $pack->id,
                    'quantite'      => $item['quantite'],
                    'prix_unitaire' => $prix,
                    'prix_total'    => $prix * $item['quantite'],
                ]);
            } else {
                $produit = Produit::find($item['produit_id'] ?? null);
                if (!$produit) {
                    continue;
                }

                $variante = !empty($item['variante_id']) ? VarianteProduit::find($item['variante_id']) : null;
                $prix = $variante && $variante->prix ? $variante->prix : $produit->prix_base;

                ArticleCommande::create([
                    'commande_id'         => $commande->id,
                    'produit_id'          => $produit->id,
                    'variante_produit_id' => $item['variante_id'] ?? null,
                    'quantite'            => $item['quantite'],
                    'prix_unitaire'       => $prix,
                    'prix_total'          => $prix * $item['quantite'],
                ]);
            }
        }

        // 5. ENVOI DES EMAILS AVANT PAIEMENT
        // - Email à l'admin : notification "nouvelle commande en attente de paiement"
        // - AUCUN email au client (il recevra le sien après paiement)

        try {
            Mail::to(config('mail.from.address'))->send(new NouvelleCommandeAdmin($commande));
        } catch (\Exception $e) {
            Log::error('Erreur email admin (nouvelle commande) : ' . $e->getMessage());
        }

        // 6. Vider le panier
        session()->forget('panier');

        return redirect()->route('commande.confirmation', $commande->id);
    }

    public function confirmation($id)
    {
        $commande = Commande::with(['cliente', 'articles.produit', 'articles.variante', 'articles.pack'])->findOrFail($id);

        return view('commande.confirmation', ['commande' => $commande]);
    }

    /**
     * Vérifie que le stock est suffisant pour tous les articles
     */
    public function verifierStockAvantPaiement(Commande $commande): bool
    {
        foreach ($commande->articles as $article) {
            if ($article->pack) {
                foreach ($article->pack->articles as $pa) {
                    $variante = $this->varianteParDefaut($pa->produit);
                    if ($variante && $variante->stock < $pa->quantite * $article->quantite) {
                        return false;
                    }
                }
            } elseif ($article->produit) {
                $variante = $article->variante ?? $this->varianteParDefaut($article->produit);
                if ($variante && $variante->stock < $article->quantite) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Retour du widget Kkiapay après paiement réussi
     */
    public function retourPaiement(Request $request, Commande $commande)
    {
        Log::info('=== RETOUR KKIAPAY ===', $request->all());

        $transactionId = $request->query('transactionId')
            ?? $request->query('transaction_id')
            ?? $request->query('id');

        if ($commande->statut_paiement !== 'paye') {
            // Double sécurité : vérifier le stock disponible
            if (!$this->verifierStockAvantPaiement($commande)) {
                return redirect()
                    ->route('commande.confirmation', $commande->id)
                    ->with('erreur', 'Paiement refusé : stock insuffisant pour un ou plusieurs articles. Contactez-nous sur WhatsApp.');
            }

            DB::transaction(function () use ($commande) {
                $commande->update([
                    'statut_paiement' => 'paye',
                    'statut'          => 'payee',
                ]);

                // Décrémentation du stock (une seule fois)
                if (!$commande->stock_decremente) {
                    foreach ($commande->articles as $article) {
                        if ($article->pack) {
                            foreach ($article->pack->articles as $pa) {
                                $variante = $this->varianteParDefaut($pa->produit);
                                $variante?->decrement('stock', $pa->quantite * $article->quantite);
                            }
                        } elseif ($article->produit) {
                            $variante = $article->variante ?? $this->varianteParDefaut($article->produit);
                            $variante?->decrement('stock', $article->quantite);
                        }
                    }
                    $commande->update(['stock_decremente' => true]);
                }
            });

            Log::info("Commande #{$commande->id} payée (transaction: {$transactionId})");

            // ==========================================================
            // ENVOI DES EMAILS APRÈS PAIEMENT VALIDÉ
            // ==========================================================

            // 1. Email de confirmation détaillé à la cliente
            if ($commande->cliente && $commande->cliente->email) {
                try {
                    Mail::to($commande->cliente->email)->send(new ConfirmationCommande($commande));
                } catch (\Exception $e) {
                    Log::error('Erreur email cliente (confirmation paiement) : ' . $e->getMessage());
                }
            }

            // 2. Notification à l'admin : commande payée
            try {
                Mail::to(config('mail.from.address'))->send(new NouvelleCommandeAdmin($commande));
            } catch (\Exception $e) {
                Log::error('Erreur email admin (commande payée) : ' . $e->getMessage());
            }

            // 3. Reçu admin (pour vos archives)
            try {
                Mail::to(config('mail.from.address'))->send(new ConfirmationCommande($commande));
            } catch (\Exception $e) {
                Log::error('Erreur reçu admin : ' . $e->getMessage());
            }
        }

        return redirect()
            ->route('commande.confirmation', $commande->id)
            ->with('succes', 'Paiement confirmé ! Merci pour votre commande.');
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