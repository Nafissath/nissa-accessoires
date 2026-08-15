<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Cliente;
use App\Models\ArticleCommande;

class CommandeController extends Controller
{
    public function index()
    {
        $panier = session('panier', []);

        if (empty($panier)) {
            return redirect()->route('boutique')->with('erreur', 'Votre panier est vide !');
        }

        return view('commande.index', [
            'panier' => $panier,
        ]);
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'quartier' => 'required|string|max:255',
            'adresse' => 'required|string',
        ]);

        $panier = session('panier', []);

        if (empty($panier)) {
            return redirect()->route('boutique')->with('erreur', 'Votre panier est vide !');
        }

        // Créer ou récupérer la cliente
        $cliente = Cliente::firstOrCreate(
            ['telephone' => $request->telephone],
            [
                'prenom' => $request->prenom,
                'nom' => $request->nom,
                'whatsapp' => $request->whatsapp,
                'ville' => $request->ville,
                'quartier' => $request->quartier,
                'adresse' => $request->adresse,
            ]
        );

        // Créer la commande
        $commande = Commande::create([
            'numero_commande' => 'NISSA-' . strtoupper(uniqid()),
            'cliente_id' => $cliente->id,
            'sous_total' => 0, // À calculer
            'frais_livraison' => 1000,
            'total' => 0, // À calculer
            'statut' => 'en_attente',
            'methode_paiement' => 'whatsapp',
            'statut_paiement' => 'non_paye',
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'whatsapp' => $request->whatsapp,
            'date_commande' => now(),
        ]);

        // Ajouter les articles
        foreach ($panier as $cle => $article) {
            ArticleCommande::create([
                'commande_id' => $commande->id,
                'produit_id' => $article['produit_id'],
                'variante_produit_id' => $article['variante_id'],
                'quantite' => $article['quantite'],
                'prix_unitaire' => 0, // À récupérer depuis le produit/variante
                'prix_total' => 0, // À calculer
            ]);
        }

        // Vider le panier
        session()->forget('panier');

        return redirect()->route('commande.confirmation', ['commande' => $commande->id]);
    }

    public function confirmation(Commande $commande)
    {
        return view('commande.confirmation', [
            'commande' => $commande->load(['cliente', 'articles.produit', 'articles.variante']),
        ]);
    }
}