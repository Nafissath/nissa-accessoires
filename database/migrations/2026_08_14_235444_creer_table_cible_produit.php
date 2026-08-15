<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cible_produit', function (Blueprint $table) {
            $table->foreignId('cible_id')->constrained('cibles')->cascadeOnDelete();
            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
            $table->primary(['cible_id', 'produit_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cible_produit');
    }
};