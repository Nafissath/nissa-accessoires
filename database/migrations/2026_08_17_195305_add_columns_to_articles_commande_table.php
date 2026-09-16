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
    Schema::table('articles_commande', function (Blueprint $table) {
        if (!Schema::hasColumn('articles_commande', 'commande_id')) {
            $table->unsignedBigInteger('commande_id')->nullable()->after('id');
        }
        if (!Schema::hasColumn('articles_commande', 'produit_id')) {
            $table->unsignedBigInteger('produit_id')->nullable();
        }
        if (!Schema::hasColumn('articles_commande', 'variante_produit_id')) {
            $table->unsignedBigInteger('variante_produit_id')->nullable();
        }
        if (!Schema::hasColumn('articles_commande', 'pack_id')) {
            $table->unsignedBigInteger('pack_id')->nullable();
        }
        if (!Schema::hasColumn('articles_commande', 'quantite')) {
            $table->integer('quantite')->default(1);
        }
        if (!Schema::hasColumn('articles_commande', 'prix_unitaire')) {
            $table->integer('prix_unitaire')->default(0);
        }
        if (!Schema::hasColumn('articles_commande', 'prix_total')) {
            $table->integer('prix_total')->default(0);
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles_commande', function (Blueprint $table) {
            //
        });
    }
};