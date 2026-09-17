<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'admin@nissa.com'],
            [
                'nom' => 'Admin Nissa',
                'email' => 'admin@nissa.com',
                'password' => Hash::make('admin123'), // Mot de passe de démo - À CHANGER en production
            ]
        );
    }
}