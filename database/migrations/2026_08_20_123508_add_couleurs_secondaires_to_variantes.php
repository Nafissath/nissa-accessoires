<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('variantes_produits', function (Blueprint $table) {
            $table->json('couleurs_secondaires')->nullable()->after('couleur_id');
            // Rendre couleur_id nullable (car on peut avoir que des couleurs secondaires)
            $table->unsignedBigInteger('couleur_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('variantes_produits', function (Blueprint $table) {
            $table->dropColumn('couleurs_secondaires');
            $table->unsignedBigInteger('couleur_id')->nullable(false)->change();
        });
    }
};