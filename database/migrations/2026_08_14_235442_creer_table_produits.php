<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('slug')->unique();
            $table->string('description_courte')->nullable();
            $table->longText('description_longue')->nullable();
            $table->unsignedBigInteger('prix_base')->default(0);
            $table->unsignedBigInteger('prix_promo')->nullable();
            $table->unsignedBigInteger('prix_coutant')->nullable();
            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('collection_id')->nullable()->constrained('collections')->nullOnDelete();
            $table->boolean('est_pack')->default(false);
            $table->boolean('est_actif')->default(true);
            $table->boolean('est_en_avant')->default(false);
            $table->boolean('gestion_stock_activee')->default(true);
            $table->string('poids')->nullable();
            $table->string('titre_seo')->nullable();
            $table->text('description_seo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};