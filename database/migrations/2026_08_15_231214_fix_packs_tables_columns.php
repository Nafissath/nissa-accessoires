<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // --- Table packs : ajouter les colonnes manquantes ---
    Schema::table('packs', function (Blueprint $table) {
        if (!Schema::hasColumn('packs', 'nom')) {
            $table->string('nom')->nullable();
        }
        if (!Schema::hasColumn('packs', 'slug')) {
            $table->string('slug')->nullable();
        }
        if (!Schema::hasColumn('packs', 'description')) {
            $table->text('description')->nullable();
        }
        if (!Schema::hasColumn('packs', 'categorie')) {
            $table->string('categorie')->nullable();
        }
        if (!Schema::hasColumn('packs', 'prix_base')) {
            $table->unsignedBigInteger('prix_base')->default(0);
        }
        if (!Schema::hasColumn('packs', 'prix_promo')) {
            $table->unsignedBigInteger('prix_promo')->nullable();
        }
        if (!Schema::hasColumn('packs', 'image')) {
            $table->string('image')->nullable();
        }
        if (!Schema::hasColumn('packs', 'actif')) {
            $table->boolean('actif')->default(true);
        }
    });

    // --- Table articles_pack : vérifier les colonnes ---
    Schema::table('articles_pack', function (Blueprint $table) {
        if (!Schema::hasColumn('articles_pack', 'pack_id')) {
            $table->foreignId('pack_id')->constrained('packs')->cascadeOnDelete();
        }
        if (!Schema::hasColumn('articles_pack', 'produit_id')) {
            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
        }
        if (!Schema::hasColumn('articles_pack', 'variante_produit_id')) {
            $table->foreignId('variante_produit_id')->nullable()->constrained('variantes_produits')->nullOnDelete();
        }
        if (!Schema::hasColumn('articles_pack', 'quantite')) {
            $table->integer('quantite')->default(1);
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};