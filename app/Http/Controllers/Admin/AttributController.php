<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use App\Models\Couleur;
use App\Models\Taille;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributController extends Controller
{
    private function modele(string $type)
    {
        return match ($type) {
            'matiere' => Matiere::class,
            'couleur' => Couleur::class,
            'taille' => Taille::class,
            default => abort(404),
        };
    }

    public function index()
    {
        return view('admin.attributs.index', [
            'matieres' => Matiere::orderBy('nom')->get(),
            'couleurs' => Couleur::orderBy('nom')->get(),
            'tailles' => Taille::orderBy('nom')->get(),
        ]);
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'type' => 'required|in:matiere,couleur,taille',
            'nom' => 'required|string|max:255',
        ]);

        $modele = $this->modele($request->type);

        $modele::create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom),
            'actif' => true,
        ]);

        return back()->with('success', ucfirst($request->type) . ' ajoutée !');
    }

    public function supprimer(Request $request, string $type, $id)
    {
        $this->modele($type)::findOrFail($id)->delete();
        return back()->with('success', 'Supprimé !');
    }

    public function toggle(string $type, $id)
    {
        $item = $this->modele($type)::findOrFail($id);
        $item->update(['actif' => !$item->actif]);
        return back()->with('success', 'Statut mis à jour !');
    }
}