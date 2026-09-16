<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Pack;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        // Pages statiques importantes
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));
        $sitemap->add(Url::create('/boutique')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));
        $sitemap->add(Url::create('/packs')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        $sitemap->add(Url::create('/a-propos')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        $sitemap->add(Url::create('/contact')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        $sitemap->add(Url::create('/faq')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        $sitemap->add(Url::create('/livraison')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        $sitemap->add(Url::create('/cgv')->setPriority(0.3)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY));

        // Produits actifs
        Produit::where('est_actif', true)->get()->each(function ($produit) use ($sitemap) {
            $imagePrincipale = $produit->images->where('est_principale', true)->first() ?? $produit->images->first();
            $imageUrl = $imagePrincipale
                ? (str_starts_with($imagePrincipale->chemin, 'http')
                    ? $imagePrincipale->chemin
                    : asset('storage/' . $imagePrincipale->chemin))
                : null;

            $url = Url::create("/produit/{$produit->slug}")
                ->setLastModificationDate($produit->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8);

            if ($imageUrl) {
                $url->addImage($imageUrl, $produit->nom);
            }

            $sitemap->add($url);
        });

        // Catégories actives
        Categorie::where('actif', true)->get()->each(function ($cat) use ($sitemap) {
            $sitemap->add(
                Url::create("/categorie/{$cat->slug}")
                    ->setLastModificationDate($cat->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.7)
            );
        });

        // Packs actifs
        Pack::where('actif', true)->get()->each(function ($pack) use ($sitemap) {
            $sitemap->add(
                Url::create("/pack/{$pack->slug}")
                    ->setLastModificationDate($pack->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        });

        return response($sitemap->render(), 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}