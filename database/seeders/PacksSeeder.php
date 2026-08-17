<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pack;
use App\Models\Produit;

class PacksSeeder extends Seeder
{
    public function run(): void
    {
        // Pack 1 : Duo Satin + Soie
        $this->creerPack(
            [
                'nom' => 'Duo Douceur Satin',
                'slug' => 'duo-douceur-satin',
                'description' => 'Deux chouchous en satin et soie pour alterner les styles tout en protégeant vos cheveux.',
                'prix_base' => 4000,
                'prix_promo' => 3500,
            ],
            [
                ['slug' => 'chouchou-satin-elegance', 'quantite' => 1],
                ['slug' => 'chouchou-soie-pure', 'quantite' => 1],
            ]
        );

        // Pack 2 : Coffret 3 chouchous
        $this->creerPack(
            [
                'nom' => 'Coffret Cheveux Protégés',
                'slug' => 'coffret-cheveux-proteges',
                'description' => 'Trois matières nobles (satin, velours, soie) pour prendre soin de vos cheveux au quotidien.',
                'prix_base' => 6000,
                'prix_promo' => 5200,
            ],
            [
                ['slug' => 'chouchou-satin-elegance', 'quantite' => 1],
                ['slug' => 'chouchou-velours-royal', 'quantite' => 1],
                ['slug' => 'chouchou-soie-pure', 'quantite' => 1],
            ]
        );

        // Pack 3 : Cadeau complet (sac + trousse)
        $this->creerPack(
            [
                'nom' => 'Pack Cadeau Artisanal',
                'slug' => 'pack-cadeau-artisanal',
                'description' => 'Un sac crochet et une trousse assortie : le cadeau parfait, fait main au Bénin.',
                'prix_base' => 13000,
                'prix_promo' => 11500,
            ],
            [
                ['slug' => 'sac-crochet-boheme', 'quantite' => 1],
                ['slug' => 'trousse-crochet-fleurie', 'quantite' => 1],
            ]
        );
    }

    private function creerPack(array $data, array $articles): void
    {
        $pack = Pack::firstOrCreate(['slug' => $data['slug']], $data);

        if ($pack->articles()->count() === 0) {
            foreach ($articles as $a) {
                $produit = Produit::where('slug', $a['slug'])->first();
                if ($produit) {
                    $pack->articles()->create([
                        'produit_id' => $produit->id,
                        'quantite' => $a['quantite'],
                    ]);
                }
            }
        }
    }
}