<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\VarianteProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommandeController extends Controller
{
    public function index(Request $request)
    {
        $query = Commande::with(['cliente', 'articles.produit', 'articles.pack']);

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        if ($request->filled('paiement')) {
            $query->where('statut_paiement', $request->paiement);
        }

        if ($request->filled('recherche')) {
            $recherche = $request->recherche;
            $query->where(function ($q) use ($recherche) {
                $q->where('numero_commande', 'LIKE', "%{$recherche}%")
                  ->orWhere('telephone', 'LIKE', "%{$recherche}%")
                  ->orWhere('whatsapp', 'LIKE', "%{$recherche}%")
                  ->orWhereHas('cliente', function ($q2) use ($recherche) {
                      $q2->where('prenom', 'LIKE', "%{$recherche}%")
                         ->orWhere('nom', 'LIKE', "%{$recherche}%");
                  });
            });
        }

        $tri = $request->input('tri', 'recent');
        switch ($tri) {
            case 'montant_desc':
                $query->orderBy('total', 'desc');
                break;
            case 'montant_asc':
                $query->orderBy('total', 'asc');
                break;
            default:
                $query->latest('date_commande');
        }

        $commandes = $query->paginate(15)->withQueryString();

        return view('admin.commandes.index', compact('commandes'));
    }

    public function show(Commande $commande)
    {
        $commande->load([
            'cliente',
            'articles.produit.images',
            'articles.variante.couleur',
            'articles.variante.taille',
            'articles.variante.matiere',
            'articles.pack.articles.produit',
        ]);

        return view('admin.commandes.show', compact('commande'));
    }

    /**
     *  Mise à jour du statut AVEC gestion automatique du stock
     */
    public function updateStatut(Request $request, Commande $commande)
    {
        $request->validate([
            'statut' => 'required|in:en_attente,payee,expediee,livree,annulee',
            'statut_paiement' => 'nullable|in:non_paye,paye,rembourse',
        ]);

        return DB::transaction(function () use ($request, $commande) {
            $commande->update([
                'statut' => $request->statut,
                'statut_paiement' => $request->statut_paiement ?? $commande->statut_paiement,
            ]);

            //  La commande est-elle considérée comme "vendue" ?
            $estVendue = $commande->statut !== 'annulee'
                && (in_array($commande->statut, ['payee', 'expediee', 'livree'])
                    || $commande->statut_paiement === 'paye');

            //  Décrémenter le stock (une seule fois)
            if ($estVendue && !$commande->stock_decremente) {
                $this->decrementeStock($commande);
                $commande->update(['stock_decremente' => true]);
                Log::info("📉 Stock décrémenté — commande #{$commande->id}");
            }

            //  Annulation → restaurer le stock
            if ($commande->statut === 'annulee' && $commande->stock_decremente) {
                $this->restaureStock($commande);
                $commande->update(['stock_decremente' => false]);
                Log::info("📈 Stock restauré — commande annulée #{$commande->id}");
            }

            $messages = [
                'payee' => ' Commande payée — stock décrémenté automatiquement.',
                'expediee' => ' Commande expédiée.',
                'livree' => ' Commande livrée.',
                'annulee' => ' Commande annulée — stock restauré.',
                'en_attente' => ' Commande remise en attente.',
            ];

            return redirect()->route('admin.commandes.show', $commande->id)
                ->with('success', $messages[$commande->statut] ?? 'Statut mis à jour !');
        });
    }

    /**
     * 📉 Décrémente le stock de chaque article
     */
    private function decrementeStock(Commande $commande): void
    {
        // 1. Vérifier AVANT que tout le stock est disponible
        foreach ($commande->articles as $article) {
            foreach ($this->lignesStock($article) as [$variante, $quantite]) {
                if ($variante->stock < $quantite) {
                    throw new \Exception(
                        "Stock insuffisant : {$article->produit->nom} (disponible {$variante->stock}, demandé {$quantite}). Ajoutez du stock avant de valider."
                    );
                }
            }
        }

        // 2. Décrémenter
        foreach ($commande->articles as $article) {
            foreach ($this->lignesStock($article) as [$variante, $quantite]) {
                $ancien = $variante->stock;
                $variante->decrement('stock', $quantite);
                Log::info("Variante #{$variante->id} : {$ancien} → {$variante->stock} (-{$quantite})");
            }
        }
    }

    /**
     * 📈 Restaure le stock (annulation)
     */
    private function restaureStock(Commande $commande): void
    {
        foreach ($commande->articles as $article) {
            foreach ($this->lignesStock($article) as [$variante, $quantite]) {
                $ancien = $variante->stock;
                $variante->increment('stock', $quantite);
                Log::info("RESTAURATION variante #{$variante->id} : {$ancien} → {$variante->stock} (+{$quantite})");
            }
        }
    }

    /**
     * Retourne les couples [variante, quantité] à impacter pour un article
     */
    private function lignesStock($article): array
    {
        $lignes = [];

        if ($article->pack) {
            // Pack → impacter la variante par défaut de chaque produit du pack
            foreach ($article->pack->articles as $pa) {
                $variante = $this->varianteParDefaut($pa->produit);
                if ($variante) {
                    $lignes[] = [$variante, $pa->quantite * $article->quantite];
                }
            }
        } elseif ($article->produit) {
            $variante = $article->variante ?? $this->varianteParDefaut($article->produit);
            if ($variante) {
                $lignes[] = [$variante, $article->quantite];
            }
        }

        return $lignes;
    }

    private function varianteParDefaut($produit): ?VarianteProduit
    {
        if (!$produit) return null;
        return $produit->variantes->firstWhere('par_defaut', true)
            ?? $produit->variantes->first();
    }
}