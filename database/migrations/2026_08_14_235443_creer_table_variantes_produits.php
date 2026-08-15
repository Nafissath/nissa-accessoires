<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('variantes_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
            $table->string('sku')->unique();
            $table->foreignId('matiere_id')->nullable()->constrained('matieres')->nullOnDelete();
            $table->foreignId('couleur_id')->nullable()->constrained('couleurs')->nullOnDelete();
            $table->foreignId('taille_id')->nullable()->constrained('tailles')->nullOnDelete();
            $table->unsignedBigInteger('prix')->nullable();
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->boolean('actif')->default(true);
            $table->boolean('par_defaut')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('variantes_produits');
    }
};