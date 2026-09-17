<?php

namespace App\Http\Controllers;

use App\Models\AvisProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AvisController extends Controller
{
    public function store(Request $request, $slug)
    {
        $produit = Produit::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nom'         => 'required|string|max:100',
            'email'       => 'required|email|max:255',
            'note'        => 'required|integer|min:1|max:5',
            'commentaire' => 'required|string|min:10|max:1000',
        ]);

        // Un seul avis par email et par produit
        $existant = AvisProduit::where('produit_id', $produit->id)
            ->where('email', strtolower(trim($request->email)))
            ->first();

        if ($existant) {
            return back()->with('erreur', 'Vous avez déjà laissé un avis pour ce produit.');
        }

        try {
            $avis = AvisProduit::create([
                'produit_id'   => $produit->id,
                'nom'          => $request->nom,
                'email'        => strtolower(trim($request->email)),
                'note'         => (int) $request->note,
                'commentaire'  => $request->commentaire,
                'est_approuve' => false,
            ]);

            Log::info('Avis créé avec succès - ID: ' . $avis->id);

            return back()->with('success', 'Merci ! Votre avis sera publié après validation par notre équipe.');
        } catch (\Exception $e) {
            Log::error('Erreur création avis : ' . $e->getMessage());
            return back()->with('erreur', 'Erreur lors de l\'envoi de votre avis : ' . $e->getMessage());
        }
    }
}