<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Collection;
use App\Models\ImageProduit;
use App\Models\VarianteProduit;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $query = Produit::with(['categorie', 'collection', 'images']);

        if ($request->filled('recherche')) {
            $query->where('nom', 'LIKE', "%{$request->recherche}%");
        }

        if ($request->filled('categorie')) {
            $query->where('categorie_id', $request->categorie);
        }

        if ($request->filled('statut')) {
            $query->where('est_actif', $request->statut === 'actif');
        }

        if ($request->filled('badge')) {
            $query->where('badge', $request->badge);
        }

        $produits = $query->latest()->paginate(20)->withQueryString();
        $categories = Categorie::orderBy('nom')->get();

        return view('admin.produits.index', compact('produits', 'categories'));
    }

    public function creer()
    {
        $categories = Categorie::where('actif', true)->get();
        $collections = Collection::where('actif', true)->get();
        $tailles = Taille::where('actif', true)->orderBy('nom')->get();
        $matieres = Matiere::where('actif', true)->orderBy('nom')->get();

        return view('admin.produits.creer', compact('categories', 'collections', 'tailles', 'matieres'));
    }

    public function enregistrer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description_courte' => 'nullable|string',
            'description_longue' => 'nullable|string',
            'prix_base' => 'required|integer|min:0',
            'prix_promo' => 'nullable|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
            'variantes' => 'nullable|array',
        ]);

        $produit = Produit::create([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom) . '-' . uniqid(),
            'description_courte' => $request->description_courte,
            'description_longue' => $request->description_longue,
            'prix_base' => $request->prix_base,
            'prix_promo' => $request->prix_promo,
            'categorie_id' => $request->categorie_id,
            'collection_id' => $request->collection_id,
            'badge' => $request->badge,
            'nuances_couleurs' => $request->nuances_couleurs,
            'est_actif' => $request->has('est_actif'),
            'est_en_avant' => $request->has('est_en_avant'),
        ]);

        // Upload images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('produits', 'public');
                ImageProduit::create([
                    'produit_id' => $produit->id,
                    'chemin' => $path,
                    'est_principale' => $index === 0,
                ]);
            }
        }

        // Créer les variantes
        if ($request->has('variantes')) {
            foreach ($request->variantes as $index => $varData) {
                if (empty($varData['couleurs']) && empty($varData['taille_id']) && empty($varData['matiere_id'])) {
                    continue;
                }

                // Gérer la couleur principale
                $couleurId = null;
                $couleurPrincipale = $varData['couleurs'][0] ?? null;

                if (!empty($couleurPrincipale['nom'])) {
                    $couleur = Couleur::firstOrCreate(
                        ['nom' => $couleurPrincipale['nom']],
                        [
                            'slug' => Str::slug($couleurPrincipale['nom']),
                            'code_hexadecimal' => $couleurPrincipale['hex'] ?? null,
                            'actif' => true,
                        ]
                    );
                    $couleurId = $couleur->id;
                }

                // Gérer les couleurs secondaires
                $couleursSecondaires = [];
                if (!empty($varData['couleurs'])) {
                    foreach (array_slice($varData['couleurs'], 1) as $couleurSec) {
                        if (!empty($couleurSec['nom'])) {
                            Couleur::firstOrCreate(
                                ['nom' => $couleurSec['nom']],
                                [
                                    'slug' => Str::slug($couleurSec['nom']),
                                    'code_hexadecimal' => $couleurSec['hex'] ?? null,
                                    'actif' => true,
                                ]
                            );
                            $couleursSecondaires[] = [
                                'nom' => $couleurSec['nom'],
                                'hex' => $couleurSec['hex'] ?? null,
                            ];
                        }
                    }
                }

                VarianteProduit::create([
                    'produit_id' => $produit->id,
                    'couleur_id' => $couleurId,
                    'couleurs_secondaires' => !empty($couleursSecondaires) ? $couleursSecondaires : null,
                    'taille_id' => $varData['taille_id'] ?: null,
                    'matiere_id' => $varData['matiere_id'] ?: null,
                    'prix' => $varData['prix'] ?: null,
                    'stock' => $varData['stock'] ?? 10,
                    'actif' => true,
                    'par_defaut' => $index === 0,
                ]);
            }
        }

        // ✅ Synchroniser le prix de base avec le prix minimum des variantes
        $produit->refresh();
        if ($produit->variantes->count() > 0) {
            $prixVariantes = $produit->variantes
                ->whereNotNull('prix')
                ->where('prix', '>', 0)
                ->pluck('prix');

            if ($prixVariantes->isNotEmpty()) {
                $prixMin = $prixVariantes->min();
                $produit->update(['prix_base' => $prixMin]);
            }
        }

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit "' . $produit->nom . '" créé avec ' . $produit->variantes->count() . ' variante(s) !');
    }

    public function modifier(Produit $produit)
    {
        $categories = Categorie::where('actif', true)->get();
        $collections = Collection::where('actif', true)->get();
        $tailles = Taille::where('actif', true)->orderBy('nom')->get();
        $matieres = Matiere::where('actif', true)->orderBy('nom')->get();
        $couleurs = Couleur::where('actif', true)->orderBy('nom')->get();

        $variantesJson = $produit->variantes->map(function ($v) {
            $couleurs = [];
            if ($v->couleur) {
                $couleurs[] = [
                    'nom' => $v->couleur->nom,
                    'hex' => $v->couleur->code_hexadecimal ?? '#D98B92',
                ];
            }
            if ($v->couleurs_secondaires) {
                foreach ($v->couleurs_secondaires as $sec) {
                    $couleurs[] = [
                        'nom' => $sec['nom'] ?? '',
                        'hex' => $sec['hex'] ?? '#D98B92',
                    ];
                }
            }
            if (empty($couleurs)) {
                $couleurs[] = ['nom' => '', 'hex' => '#D98B92'];
            }

            return [
                'id' => $v->id,
                'couleurs' => $couleurs,
                'taille_id' => $v->taille_id ?? '',
                'matiere_id' => $v->matiere_id ?? '',
                'prix' => $v->prix ?? '',
                'stock' => $v->stock ?? 10,
            ];
        })->values()->toJson();

        return view('admin.produits.modifier', compact(
            'produit',
            'categories',
            'collections',
            'tailles',
            'matieres',
            'couleurs',
            'variantesJson'
        ));
    }

    public function mettreAJour(Request $request, Produit $produit)
    {
        try {
            Log::info('=== DÉBUT MISE À JOUR PRODUIT ===');
            Log::info('Produit ID: ' . $produit->id);
            Log::info('Données reçues:', $request->all());

            // Validation
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'prix_base' => 'required|integer|min:0',
                'categorie_id' => 'required|exists:categories,id',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
                'variantes' => 'nullable|array',
            ]);

            Log::info('Validation OK');

            // Mise à jour du produit
            $produit->update([
                'nom' => $request->nom,
                'description_courte' => $request->description_courte,
                'description_longue' => $request->description_longue,
                'prix_base' => $request->prix_base,
                'prix_promo' => $request->prix_promo,
                'categorie_id' => $request->categorie_id,
                'collection_id' => $request->collection_id,
                'badge' => $request->badge,
                'nuances_couleurs' => $request->nuances_couleurs,
                'est_actif' => $request->has('est_actif'),
                'est_en_avant' => $request->has('est_en_avant'),
            ]);

            Log::info('Produit mis à jour');

            // Upload images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('produits', 'public');
                    ImageProduit::create([
                        'produit_id' => $produit->id,
                        'chemin' => $path,
                        'est_principale' => $produit->images()->count() === 0,
                    ]);
                }
                Log::info('Images uploadées');
            }

            // Gestion des variantes
            if ($request->has('variantes')) {
                Log::info('Traitement des variantes', ['count' => count($request->variantes)]);

                $variantesIds = array_filter(array_column($request->variantes, 'id'));
                Log::info('Variantes IDs existantes:', $variantesIds);

                $produit->variantes()->whereNotIn('id', $variantesIds)->delete();
                Log::info('Anciennes variantes supprimées');

                foreach ($request->variantes as $index => $varData) {
                    Log::info("Traitement variante #$index", $varData);

                    if (empty($varData['couleurs']) && empty($varData['taille_id']) && empty($varData['matiere_id'])) {
                        Log::info("Variante #$index vide, on skip");
                        continue;
                    }

                    // Couleur principale
                    $couleurId = null;
                    $couleurPrincipale = $varData['couleurs'][0] ?? null;

                    if (!empty($couleurPrincipale['nom'])) {
                        $couleur = Couleur::firstOrCreate(
                            ['nom' => $couleurPrincipale['nom']],
                            [
                                'slug' => Str::slug($couleurPrincipale['nom']),
                                'code_hexadecimal' => $couleurPrincipale['hex'] ?? null,
                                'actif' => true,
                            ]
                        );
                        $couleurId = $couleur->id;
                        Log::info('Couleur principale créée/trouvée', ['id' => $couleurId]);
                    }

                    // Couleurs secondaires
                    $couleursSecondaires = [];
                    if (!empty($varData['couleurs'])) {
                        foreach (array_slice($varData['couleurs'], 1) as $couleurSec) {
                            if (!empty($couleurSec['nom'])) {
                                Couleur::firstOrCreate(
                                    ['nom' => $couleurSec['nom']],
                                    [
                                        'slug' => Str::slug($couleurSec['nom']),
                                        'code_hexadecimal' => $couleurSec['hex'] ?? null,
                                        'actif' => true,
                                    ]
                                );
                                $couleursSecondaires[] = [
                                    'nom' => $couleurSec['nom'],
                                    'hex' => $couleurSec['hex'] ?? null,
                                ];
                            }
                        }
                    }

                    $varianteData = [
                        'couleur_id' => $couleurId,
                        'couleurs_secondaires' => !empty($couleursSecondaires) ? $couleursSecondaires : null,
                        'taille_id' => $varData['taille_id'] ?: null,
                        'matiere_id' => $varData['matiere_id'] ?: null,
                        'prix' => $varData['prix'] ?: null,
                        'stock' => $varData['stock'] ?? 10,
                        'actif' => true,
                    ];

                    Log::info('Données variante:', $varianteData);

                    if (!empty($varData['id'])) {
                        VarianteProduit::where('id', $varData['id'])->update($varianteData);
                        Log::info("Variante #{$varData['id']} mise à jour");
                    } else {
                        $varianteData['produit_id'] = $produit->id;
                        $varianteData['par_defaut'] = $index === 0;
                        VarianteProduit::create($varianteData);
                        Log::info("Nouvelle variante créée");
                    }
                }
            }

            // Synchronisation prix
            $produit->refresh();
            if ($produit->variantes->count() > 0) {
                $prixVariantes = $produit->variantes
                    ->whereNotNull('prix')
                    ->where('prix', '>', 0)
                    ->pluck('prix');

                if ($prixVariantes->isNotEmpty()) {
                    $prixMin = $prixVariantes->min();
                    $produit->update(['prix_base' => $prixMin]);
                    Log::info("Prix base synchronisé: $prixMin");
                }
            }

            Log::info('=== FIN MISE À JOUR RÉUSSIE ===');

            return redirect()->route('admin.produits.index')
                ->with('success', 'Produit "' . $produit->nom . '" mis à jour !');

        } catch (\Exception $e) {
            Log::error('=== ERREUR MISE À JOUR ===');
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return back()->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

    public function supprimer(Produit $produit)
    {
        foreach ($produit->images as $image) {
            Storage::disk('public')->delete($image->chemin);
        }
        $produit->delete();

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit supprimé !');
    }

    public function supprimerImage($imageId)
    {
        $image = ImageProduit::findOrFail($imageId);
        Storage::disk('public')->delete($image->chemin);
        $image->delete();

        return back()->with('success', 'Image supprimée');
    }

    public function imagePrincipale($imageId)
    {
        $image = ImageProduit::findOrFail($imageId);
        ImageProduit::where('produit_id', $image->produit_id)->update(['est_principale' => false]);
        $image->update(['est_principale' => true]);

        return back()->with('success', 'Image principale mise à jour');
    }

    public function supprimerVariante(VarianteProduit $variante)
    {
        $variante->delete();
        return back()->with('success', 'Variante supprimée !');
    }
}