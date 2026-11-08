<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Cliente;
use App\Models\VarianteProduit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TableauDeBordController extends Controller
{
    public function index()
    {
        $debutMois = Carbon::now()->startOfMonth();
        $finMois = Carbon::now()->endOfMonth();
        $debutMoisDernier = Carbon::now()->subMonth()->startOfMonth();
        $finMoisDernier = Carbon::now()->subMonth()->endOfMonth();

        // 💡 Graphique CA 6 mois (1 seule requête)
        $sixMoisAgo = Carbon::now()->subMonths(5)->startOfMonth();
        $caMensuel = Commande::where('statut_paiement', 'paye')
            ->where('date_commande', '>=', $sixMoisAgo)
            ->select(
                DB::raw("DATE_FORMAT(date_commande, '%Y-%m') as mois"),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('mois')
            ->pluck('total', 'mois');

        $caParMois = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $cle = $date->format('Y-m');
            $caParMois[] = [
                'label' => $date->locale('fr')->isoFormat('MMM'),
                'valeur' => (int) ($caMensuel[$cle] ?? 0),
            ];
        }

        $stats = [
            'commandes_total' => Commande::count(),
            'commandes_aujourdhui' => Commande::whereDate('date_commande', today())->count(),
            'commandes_en_attente' => Commande::where('statut', 'en_attente')->count(),
            'commandes_payees' => Commande::where('statut', 'payee')->count(),
            'commandes_mois' => Commande::whereBetween('date_commande', [$debutMois, $finMois])->count(),

            'ca_total' => Commande::where('statut_paiement', 'paye')->sum('total'),
            'ca_aujourdhui' => Commande::where('statut_paiement', 'paye')
                ->whereDate('date_commande', today())->sum('total'),
            'ca_mois' => Commande::where('statut_paiement', 'paye')
                ->whereBetween('date_commande', [$debutMois, $finMois])->sum('total'),
            'ca_mois_dernier' => Commande::where('statut_paiement', 'paye')
                ->whereBetween('date_commande', [$debutMoisDernier, $finMoisDernier])->sum('total'),

            'produits_total' => Produit::where('est_actif', true)->count(),
            'clientes_total' => Cliente::count(),
            'mois_actuel' => Carbon::now()->locale('fr')->isoFormat('MMMM YYYY'),
        ];

        $stats['evolution_ca'] = $stats['ca_mois_dernier'] > 0
            ? round((($stats['ca_mois'] - $stats['ca_mois_dernier']) / $stats['ca_mois_dernier']) * 100, 1)
            : 0;

        $stats['ruptures_stock'] = VarianteProduit::where('stock', 0)
            ->whereHas('produit', fn($q) => $q->where('est_actif', true))
            ->count();

        $dernieresCommandes = Commande::with('cliente')->latest('date_commande')->take(5)->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'dernieresCommandes' => $dernieresCommandes,
            'caParMois' => $caParMois,
        ]);
    }
}