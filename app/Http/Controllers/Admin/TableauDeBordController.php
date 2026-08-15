<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Cliente;

class TableauDeBordController extends Controller
{
    public function index()
    {
        $statistiques = [
            'total_commandes' => Commande::count(),
            'commandes_aujourd_hui' => Commande::whereDate('created_at', today())->count(),
            'total_produits' => Produit::count(),
            'produits_actifs' => Produit::where('est_actif', true)->count(),
            'total_clientes' => Cliente::count(),
            'chiffre_affaires' => Commande::where('statut_paiement', 'paye')->sum('total'),
        ];

        $commandesRecentes = Commande::with('cliente')
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.tableau-de-bord', [
            'statistiques' => $statistiques,
            'commandesRecentes' => $commandesRecentes,
        ]);
    }
}