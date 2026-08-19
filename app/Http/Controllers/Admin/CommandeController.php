<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index(Request $request)
    {
        $query = Commande::with(['cliente', 'articles.produit', 'articles.pack']);

        // Filtre par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        // Filtre par statut de paiement
        if ($request->filled('paiement')) {
            $query->where('statut_paiement', $request->paiement);
        }

        // Recherche par numéro de commande ou nom de cliente
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

        // Tri
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
        $commande->load(['cliente', 'articles.produit', 'articles.variante.couleur', 'articles.variante.taille', 'articles.pack']);

        return view('admin.commandes.show', compact('commande'));
    }

    public function updateStatut(Request $request, Commande $commande)
    {
        $request->validate([
            'statut' => 'required|in:en_attente,payee,expediee,livree,annulee',
            'statut_paiement' => 'nullable|in:non_paye,paye,rembourse',
        ]);

        $commande->update([
            'statut' => $request->statut,
            'statut_paiement' => $request->statut_paiement ?? $commande->statut_paiement,
        ]);

        return redirect()->route('admin.commandes.show', $commande->id)
            ->with('success', 'Statut mis à jour avec succès !');
    }
}