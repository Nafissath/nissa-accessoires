<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Cliente::withCount('commandes')
            ->withSum(['commandes as total_depense' => fn($q) => $q->where('statut_paiement', 'paye')], 'total');

        if ($request->filled('recherche')) {
            $r = $request->recherche;
            $query->where(fn($q) => $q
                ->where('prenom', 'LIKE', "%{$r}%")
                ->orWhere('nom', 'LIKE', "%{$r}%")
                ->orWhere('telephone', 'LIKE', "%{$r}%")
                ->orWhere('email', 'LIKE', "%{$r}%"));
        }

        $clientes = $query->latest()->paginate(15)->withQueryString();

        return view('admin.clientes.index', compact('clientes'));
    }

    public function show(Cliente $cliente)
    {
        $cliente->load(['commandes.articles.produit', 'commandes.articles.pack']);

        return view('admin.clientes.show', compact('cliente'));
    }
}