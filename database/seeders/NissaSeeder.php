<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Matiere;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\Produit;
use App\Models\VarianteProduit;
use App\Models\ImageProduit;
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

        // 5. Produits avec IMAGES UNSPLASH
        $produits = [
            [
                'nom' => 'Chouchou Satin Élégance',
                'slug' => 'chouchou-satin-elegance',
                'description_courte' => 'Un chouchou en satin doux pour protéger vos cheveux.',
                'description_longue' => 'Notre chouchou en satin premium est conçu pour prendre soin de vos cheveux au quotidien. La douceur du satin réduit les frictions, prévient la casse et les fourches. Parfait pour les cheveux naturels, lisses ou bouclés.',
                'prix_base' => 1500,
                'categorie' => $catChouchous,
                'matiere' => $matSatin,
                'couleurs' => [$colRose, $colBeige, $colNoir],
                'tailles' => [$taillePetit, $tailleGrand],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1599643477877-530eb83abc8e?w=800&q=80',
                    'https://images.unsplash.com/photo-1596993100471-c3905dafa3b2?w=800&q=80',
                ],
            ],
            [
                'nom' => 'Chouchou Velours Royal',
                'slug' => 'chouchou-velours-royal',
                'description_courte' => 'L\'élégance du velours pour vos coiffures.',
                'description_longue' => 'Le chouchou en velours apporte une touche luxueuse et vintage à vos coiffures. Sa texture douce et riche est parfaite pour les occasions spéciales comme pour le quotidien.',
                'prix_base' => 2000,
                'categorie' => $catChouchous,
                'matiere' => $matVelours,
                'couleurs' => [$colChoco, $colRose, $colNoir],
                'tailles' => [$tailleMoyen],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1606293459339-aa5d34a7b0e1?w=800&q=80',
                    'https://images.unsplash.com/photo-1599459182681-78a85d0e51c6?w=800&q=80',
                ],
            ],
            [
                'nom' => 'Chouchou Soie Pure',
                'slug' => 'chouchou-soie-pure',
                'description_courte' => 'La douceur incomparable de la soie naturelle.',
                'description_longue' => 'Notre chouchou en soie véritable est un must-have pour les cheveux exigeants. La soie maintient l\'hydratation naturelle et donne une brillance exceptionnelle.',
                'prix_base' => 2500,
                'categorie' => $catChouchous,
                'matiere' => $matSoie,
                'couleurs' => [$colBlanc, $colRose, $colBeige],
                'tailles' => [$taillePetit, $tailleMoyen],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1598300042247-d83d4a5c86d5?w=800&q=80',
                    'https://images.unsplash.com/photo-1616530940355-356782ae3071?w=800&q=80',
                ],
            ],
            [
                'nom' => 'Chouchou Laine Cocoon',
                'slug' => 'chouchou-laine-cocoon',
                'description_courte' => 'Douceur et chaleur pour les journées fraîches.',
                'description_longue' => 'Le chouchou en laine douce est parfait pour la saison fraîche. Confortable et douillet, il apporte une touche cocooning à vos tenues.',
                'prix_base' => 1800,
                'categorie' => $catChouchous,
                'matiere' => $matLaine,
                'couleurs' => [$colBeige, $colChoco],
                'tailles' => [$tailleGrand],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1617226213269-1c7b7f3d0e42?w=800&q=80',
                    'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=800&q=80',
                ],
            ],
            [
                'nom' => 'Sac Crochet Bohème',
                'slug' => 'sac-crochet-boheme',
                'description_courte' => 'Un sac unique fait main au crochet.',
                'description_longue' => 'Ce sac en crochet est entièrement fait main avec des fils de coton de qualité. Chaque pièce est unique, confectionnée avec amour par nos artisans.',
                'prix_base' => 8500,
                'categorie' => $catSacs,
                'matiere' => $matCrochet,
                'couleurs' => [$colBeige, $colChoco],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?w=800&q=80',
                    'https://images.unsplash.com/photo-1591348278863-a8fb3887e2aa?w=800&q=80',
                ],
            ],
            [
                'nom' => 'Pochette Soirée Satin',
                'slug' => 'pochette-soiree-satin',
                'description_courte' => 'Élégance pour vos soirées spéciales.',
                'description_longue' => 'Cette pochette en satin est l\'accessoire idéal pour vos soirées, mariages et occasions spéciales. Son éclat discret sublime toutes vos tenues.',
                'prix_base' => 5000,
                'categorie' => $catSacs,
                'matiere' => $matSatin,
                'couleurs' => [$colRose, $colNoir, $colChoco],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?w=800&q=80',
                    'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800&q=80',
                ],
            ],
            [
                'nom' => 'Trousse Crochet Fleurie',
                'slug' => 'trousse-crochet-fleurie',
                'description_courte' => 'Trousse artisanale avec motifs fleuris.',
                'description_longue' => 'Cette trousse au crochet est ornée de délicates fleurs faites main. Parfaite pour ranger maquillage, stylos ou petits accessoires.',
                'prix_base' => 4500,
                'categorie' => $catTrousses,
                'matiere' => $matCrochet,
                'couleurs' => [$colRose, $colBeige],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=800&q=80',
                    'https://images.unsplash.com/photo-1594223274512-ad480f53b7d2?w=800&q=80',
                ],
            ],
            [
                'nom' => 'Trousse Velours Chic',
                'slug' => 'trousse-velours-chic',
                'description_courte' => 'Trousse élégante en velours doux.',
                'description_longue' => 'Trousse en velours premium avec fermeture dorée. Idéale pour organiser vos essentiels avec élégance.',
                'prix_base' => 3500,
                'categorie' => $catTrousses,
                'matiere' => $matVelours,
                'couleurs' => [$colNoir, $colChoco, $colRose],
                'tailles' => [$tailleUnique],
                'en_avant' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800&q=80',
                    'https://images.unsplash.com/photo-1591561954557-26941169b49e?w=800&q=80',
                ],
            ],
        ];

        foreach ($produits as $data) {
            $produit = Produit::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'nom' => $data['nom'],
                    'description_courte' => $data['description_courte'],
                    'description_longue' => $data['description_longue'],
                    'prix_base' => $data['prix_base'],
                    'categorie_id' => $data['categorie']->id,
                    'est_actif' => true,
                    'est_en_avant' => $data['en_avant'],
                ]
            );

            // Créer les images (URLs Unsplash directement)
            foreach ($data['images'] as $index => $imageUrl) {
                ImageProduit::firstOrCreate(
                    [
                        'produit_id' => $produit->id,
                        'chemin' => $imageUrl,
                    ],
                    [
                        'est_principale' => $index === 0,
                    ]
                );
            }

            // Créer les variantes
            foreach ($data['couleurs'] as $couleur) {
                foreach ($data['tailles'] as $taille) {
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

        $this->command->info(' 8 produits créés avec images et variantes !');
    }
}