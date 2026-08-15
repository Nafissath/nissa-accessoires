<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Matiere;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\Produit;
use App\Models\VarianteProduit;
use Illuminate\Support\Str;

class NissaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Catégories
        $catChouchous = Categorie::firstOrCreate(
            ['slug' => 'chouchous'],
            ['nom' => 'Chouchous', 'actif' => true, 'description' => 'Nos chouchous en satin, soie, velours et laine']
        );
        $catSacs = Categorie::firstOrCreate(
            ['slug' => 'sacs'],
            ['nom' => 'Sacs', 'actif' => true, 'description' => 'Sacs et pochettes au crochet faits main']
        );
        $catTrousses = Categorie::firstOrCreate(
            ['slug' => 'trousses'],
            ['nom' => 'Trousses', 'actif' => true, 'description' => 'Trousses artisanales pour tous vos essentiels']
        );

        // 2. Matières
        $matSatin = Matiere::firstOrCreate(['slug' => 'satin'], ['nom' => 'Satin', 'actif' => true]);
        $matSoie = Matiere::firstOrCreate(['slug' => 'soie'], ['nom' => 'Soie', 'actif' => true]);
        $matVelours = Matiere::firstOrCreate(['slug' => 'velours'], ['nom' => 'Velours', 'actif' => true]);
        $matLaine = Matiere::firstOrCreate(['slug' => 'laine'], ['nom' => 'Laine', 'actif' => true]);
        $matCrochet = Matiere::firstOrCreate(['slug' => 'crochet'], ['nom' => 'Crochet', 'actif' => true]);

        // 3. Couleurs
        $colRose = Couleur::firstOrCreate(['slug' => 'rose-poudre'], ['nom' => 'Rose poudré', 'code_hexadecimal' => '#E8B4B8', 'actif' => true]);
        $colBeige = Couleur::firstOrCreate(['slug' => 'beige-creme'], ['nom' => 'Beige crème', 'code_hexadecimal' => '#F8F4EF', 'actif' => true]);
        $colNoir = Couleur::firstOrCreate(['slug' => 'noir'], ['nom' => 'Noir', 'code_hexadecimal' => '#000000', 'actif' => true]);
        $colChoco = Couleur::firstOrCreate(['slug' => 'chocolat'], ['nom' => 'Chocolat', 'code_hexadecimal' => '#5C4033', 'actif' => true]);
        $colBlanc = Couleur::firstOrCreate(['slug' => 'blanc'], ['nom' => 'Blanc', 'code_hexadecimal' => '#FFFFFF', 'actif' => true]);

        // 4. Tailles
        $taillePetit = Taille::firstOrCreate(['slug' => 'petit'], ['nom' => 'Petit', 'actif' => true]);
        $tailleMoyen = Taille::firstOrCreate(['slug' => 'moyen'], ['nom' => 'Moyen', 'actif' => true]);
        $tailleGrand = Taille::firstOrCreate(['slug' => 'grand'], ['nom' => 'Grand', 'actif' => true]);
        $tailleUnique = Taille::firstOrCreate(['slug' => 'unique'], ['nom' => 'Unique', 'actif' => true]);

        // 5. Produits
        $produits = [
            [
                'nom' => 'Chouchou Satin Élégance',
                'slug' => 'chouchou-satin-elegance',
                'description_courte' => 'Un chouchou en satin doux pour protéger vos cheveux.',
                'prix_base' => 1500,
                'categorie' => $catChouchous,
                'matiere' => $matSatin,
                'couleurs' => [$colRose, $colBeige, $colNoir],
                'tailles' => [$taillePetit, $tailleGrand],
                'en_avant' => true,
            ],
            [
                'nom' => 'Chouchou Velours Royal',
                'slug' => 'chouchou-velours-royal',
                'description_courte' => 'L\'élégance du velours pour vos coiffures.',
                'prix_base' => 2000,
                'categorie' => $catChouchous,
                'matiere' => $matVelours,
                'couleurs' => [$colChoco, $colRose, $colNoir],
                'tailles' => [$tailleMoyen],
                'en_avant' => true,
            ],
            [
                'nom' => 'Chouchou Soie Pure',
                'slug' => 'chouchou-soie-pure',
                'description_courte' => 'La douceur incomparable de la soie naturelle.',
                'prix_base' => 2500,
                'categorie' => $catChouchous,
                'matiere' => $matSoie,
                'couleurs' => [$colBlanc, $colRose, $colBeige],
                'tailles' => [$taillePetit, $tailleMoyen],
                'en_avant' => true,
            ],
            [
                'nom' => 'Chouchou Laine Cocoon',
                'slug' => 'chouchou-laine-cocoon',
                'description_courte' => 'Douceur et chaleur pour les journées fraîches.',
                'prix_base' => 1800,
                'categorie' => $catChouchous,
                'matiere' => $matLaine,
                'couleurs' => [$colBeige, $colChoco],
                'tailles' => [$tailleGrand],
                'en_avant' => true,
            ],
            [
                'nom' => 'Sac Crochet Bohème',
                'slug' => 'sac-crochet-boheme',
                'description_courte' => 'Un sac unique fait main au crochet.',
                'prix_base' => 8500,
                'categorie' => $catSacs,
                'matiere' => $matCrochet,
                'couleurs' => [$colBeige, $colChoco],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
            ],
            [
                'nom' => 'Pochette Soirée Satin',
                'slug' => 'pochette-soiree-satin',
                'description_courte' => 'Élégance pour vos soirées spéciales.',
                'prix_base' => 5000,
                'categorie' => $catSacs,
                'matiere' => $matSatin,
                'couleurs' => [$colRose, $colNoir, $colChoco],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
            ],
            [
                'nom' => 'Trousse Crochet Fleurie',
                'slug' => 'trousse-crochet-fleurie',
                'description_courte' => 'Trousse artisanale avec motifs fleuris.',
                'prix_base' => 4500,
                'categorie' => $catTrousses,
                'matiere' => $matCrochet,
                'couleurs' => [$colRose, $colBeige],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
            ],
            [
                'nom' => 'Trousse Velours Chic',
                'slug' => 'trousse-velours-chic',
                'description_courte' => 'Trousse élégante en velours doux.',
                'prix_base' => 3500,
                'categorie' => $catTrousses,
                'matiere' => $matVelours,
                'couleurs' => [$colNoir, $colChoco, $colRose],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
            ],
        ];

        foreach ($produits as $data) {
            $produit = Produit::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'nom' => $data['nom'],
                    'description_courte' => $data['description_courte'],
                    'prix_base' => $data['prix_base'],
                    'categorie_id' => $data['categorie']->id,
                    'est_actif' => true,
                    'est_en_avant' => $data['en_avant'],
                ]
            );

            // Créer les variantes avec SKU unique basé sur le SLUG complet
            foreach ($data['couleurs'] as $couleur) {
                foreach ($data['tailles'] as $taille) {
                    // SKU unique : slug-produit + couleur + taille
                    $sku = strtoupper(
                        Str::limit(str_replace('-', '', $produit->slug), 10, '') . 
                        '-' . 
                        $couleur->slug . 
                        '-' . 
                        $taille->slug
                    );

                    VarianteProduit::firstOrCreate(
                        [
                            'produit_id' => $produit->id,
                            'couleur_id' => $couleur->id,
                            'taille_id' => $taille->id,
                            'matiere_id' => $data['matiere']->id,
                        ],
                        [
                            'sku' => $sku,
                            'prix' => $data['prix_base'],
                            'stock' => rand(5, 20),
                            'actif' => true,
                        ]
                    );
                }
            }
        }

        $this->command->info('✅ ' . count($produits) . ' produits créés avec leurs variantes !');
    }
}