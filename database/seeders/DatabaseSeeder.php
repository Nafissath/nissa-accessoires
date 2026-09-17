<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,      // Créer l'admin de démo
            NissaSeeder::class,      // Produits, catégories, couleurs, tailles
            PacksSeeder::class,      // Packs cadeaux
            ParametreSeeder::class,  // Paramètres du site (WhatsApp, email, etc.)
        ]);
    }
}