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
    Schema::table('commandes', function (Blueprint $table) {
        if (!Schema::hasColumn('commandes', 'numero_commande')) {
            $table->string('numero_commande')->unique()->nullable()->after('id');
        }
        if (!Schema::hasColumn('commandes', 'cliente_id')) {
            $table->foreignId('cliente_id')->nullable()->after('numero_commande');
        }
        if (!Schema::hasColumn('commandes', 'sous_total')) {
            $table->integer('sous_total')->default(0);
        }
        if (!Schema::hasColumn('commandes', 'frais_livraison')) {
            $table->integer('frais_livraison')->default(1000);
        }
        if (!Schema::hasColumn('commandes', 'total')) {
            $table->integer('total')->default(0);
        }
        if (!Schema::hasColumn('commandes', 'statut')) {
            $table->string('statut')->default('en_attente');
        }
        if (!Schema::hasColumn('commandes', 'methode_paiement')) {
            $table->string('methode_paiement')->default('mobile_money');
        }
        if (!Schema::hasColumn('commandes', 'statut_paiement')) {
            $table->string('statut_paiement')->default('non_paye');
        }
        if (!Schema::hasColumn('commandes', 'ville')) {
            $table->string('ville')->nullable();
        }
        if (!Schema::hasColumn('commandes', 'quartier')) {
            $table->string('quartier')->nullable();
        }
        if (!Schema::hasColumn('commandes', 'adresse')) {
            $table->text('adresse')->nullable();
        }
        if (!Schema::hasColumn('commandes', 'telephone')) {
            $table->string('telephone')->nullable();
        }
        if (!Schema::hasColumn('commandes', 'whatsapp')) {
            $table->string('whatsapp')->nullable();
        }
        if (!Schema::hasColumn('commandes', 'date_commande')) {
            $table->timestamp('date_commande')->nullable();
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            //
        });
    }
};