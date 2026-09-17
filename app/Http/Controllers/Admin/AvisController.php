<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AvisProduit;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function index(Request $request)
    {
        $query = AvisProduit::with('produit');

        if ($request->filled('statut')) {
            if ($request->statut === 'approuve') {
                $query->where('est_approuve', true);
            } elseif ($request->statut === 'attente') {
                $query->where('est_approuve', false);
            }
        }

        $avis = $query->latest()->paginate(20)->withQueryString();
        $enAttente = AvisProduit::where('est_approuve', false)->count();

        return view('admin.avis.index', compact('avis', 'enAttente'));
    }

    public function approuver(AvisProduit $avis)
    {
        $avis->update(['est_approuve' => true]);
        return back()->with('success', 'Avis approuvé et publié sur la fiche produit.');
    }

    public function refuser(AvisProduit $avis)
    {
        $avis->update(['est_approuve' => false]);
        return back()->with('success', 'Avis remis en attente de validation.');
    }

    public function supprimer(AvisProduit $avis)
    {
        $avis->delete();
        return back()->with('success', 'Avis supprimé définitivement.');
    }
}