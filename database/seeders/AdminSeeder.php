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
            ['email' => 'nissa.accessoires@gmail.com'],
            [
                'nom' => 'Nafissath',
                'email' => 'nissa.accessoires@gmail.com',
                'password' => Hash::make('r'), // ⚠️ Change ce mot de passe !
            ]
        );
    }
}