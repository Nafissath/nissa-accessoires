<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aPropos()
    {
        return view('pages.a-propos', [
            'title' => 'À propos de Nissa Accessoires',
            'description' => 'Découvrez l\'histoire de Nissa Accessoires, marque béninoise d\'accessoires artisanaux faits main avec passion.'
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Contact - Nissa Accessoires',
            'description' => 'Contactez Nissa Accessoires pour toute question sur nos créations artisanales ou votre commande.'
        ]);
    }

    public function faq()
    {
        return view('pages.faq', [
            'title' => 'FAQ - Questions fréquentes',
            'description' => 'Réponses aux questions les plus fréquentes sur Nissa Accessoires : livraison, paiement, retours...'
        ]);
    }

    public function mentionsLegales()
    {
        return view('pages.mentions-legales', [
            'title' => 'Mentions légales',
            'description' => 'Mentions légales de Nissa Accessoires'
        ]);
    }

    public function cgv()
    {
        return view('pages.cgv', [
            'title' => 'Conditions Générales de Vente',
            'description' => 'Conditions générales de vente de Nissa Accessoires'
        ]);
    }

    public function politiqueConfidentialite()
    {
        return view('pages.politique-confidentialite', [
            'title' => 'Politique de confidentialité',
            'description' => 'Politique de confidentialité et protection des données personnelles - Nissa Accessoires'
        ]);
    }

    public function politiqueRetours()
    {
        return view('pages.politique-retours', [
            'title' => 'Politique de retours et remboursements',
            'description' => 'Politique de retours et remboursements - Nissa Accessoires'
        ]);
    }

    public function livraison()
    {
        return view('pages.livraison', [
            'title' => 'Livraison - Nissa Accessoires',
            'description' => 'Informations sur la livraison partout au Bénin - Nissa Accessoires'
        ]);
    }
}