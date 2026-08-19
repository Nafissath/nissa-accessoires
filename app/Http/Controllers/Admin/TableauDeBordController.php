<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Cliente;

class TableauDeBordController extends Controller
{
    // PAS DE CONSTRUCTEUR, PAS DE MIDDLEWARE ICI
    
    public function index()
    {
        $stats = [
            'commandes_total' => Commande::count(),
            'commandes_aujourdhui' => Commande::whereDate('date_commande', today())->count(),
            'commandes_en_attente' => Commande::where('statut', 'en_attente')->count(),
            'commandes_payees' => Commande::where('statut', 'payee')->count(),
            'ca_total' => Commande::where('statut_paiement', 'paye')->sum('total'),
            'ca_aujourdhui' => Commande::where('statut_paiement', 'paye')
                ->whereDate('date_commande', today())
                ->sum('total'),
            'produits_total' => Produit::where('est_actif', true)->count(),
            'clientes_total' => Cliente::count(),
        ];

        $dernieresCommandes = Commande::with('cliente')
            ->latest('date_commande')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'dernieresCommandes' => $dernieresCommandes,
        ]);
    }
}