<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parametre;

class ParametreSeeder extends Seeder
{
    public function run(): void
    {
        $parametres = [
            'whatsapp' => '2290191309710',
            'email' => 'nissa.accessoires@gmail.com',
            'adresse' => 'Cotonou, Bénin',
            'tiktok' => 'https://www.tiktok.com/@nissa_accessoires',
            'instagram' => '',
            'texte_livraison' => 'Bénin ou international. Les frais de livraison seront confirmés après la commande.',
        ];

        foreach ($parametres as $cle => $valeur) {
            Parametre::updateOrCreate(['cle' => $cle], ['valeur' => $valeur]);
        }
    }
}