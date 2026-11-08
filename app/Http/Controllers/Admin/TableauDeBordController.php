<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Cliente;
use Carbon\Carbon;

class TableauDeBordController extends Controller
{
    public function index()
    {
        $debutMois = Carbon::now()->startOfMonth();
        $finMois = Carbon::now()->endOfMonth();
        $debutMoisDernier = Carbon::now()->subMonth()->startOfMonth();
        $finMoisDernier = Carbon::now()->subMonth()->endOfMonth();

        $stats = [
            // Commandes
            'commandes_total' => Commande::count(),
            'commandes_aujourdhui' => Commande::whereDate('date_commande', today())->count(),
            'commandes_en_attente' => Commande::where('statut', 'en_attente')->count(),
            'commandes_payees' => Commande::where('statut', 'payee')->count(),
            'commandes_mois' => Commande::whereBetween('date_commande', [$debutMois, $finMois])->count(),

            // Chiffre d'affaires
            'ca_total' => Commande::where('statut_paiement', 'paye')->sum('total'),
            'ca_aujourdhui' => Commande::where('statut_paiement', 'paye')
                ->whereDate('date_commande', today())
                ->sum('total'),
            'ca_mois' => Commande::where('statut_paiement', 'paye')
                ->whereBetween('date_commande', [$debutMois, $finMois])
                ->sum('total'),
            'ca_mois_dernier' => Commande::where('statut_paiement', 'paye')
                ->whereBetween('date_commande', [$debutMoisDernier, $finMoisDernier])
                ->sum('total'),

            // Autres
            'produits_total' => Produit::where('est_actif', true)->count(),
            'clientes_total' => Cliente::count(),
            'mois_actuel' => Carbon::now()->locale('fr')->isoFormat('MMMM YYYY'),
        ];

        // Calcul évolution CA (en %)
        $evolution = 0;
        if ($stats['ca_mois_dernier'] > 0) {
            $evolution = round((($stats['ca_mois'] - $stats['ca_mois_dernier']) / $stats['ca_mois_dernier']) * 100, 1);
        }
        $stats['evolution_ca'] = $evolution;

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