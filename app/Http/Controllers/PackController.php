<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function index()
    {
        $packs = Pack::where('actif', true)
            ->with(['articles.produit.images'])
            ->latest()
            ->get();

        return view('packs.index', [
            'packs' => $packs,
        ]);
    }

    public function afficher($slug)
    {
        $pack = Pack::where('slug', $slug)
            ->where('actif', true)
            ->with(['articles.produit.images', 'articles.produit.categorie', 'articles.variante'])
            ->firstOrFail();

        return view('packs.afficher', [
            'pack' => $pack,
        ]);
    }
}