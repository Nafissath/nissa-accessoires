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
    Schema::create('images_produits', function (Blueprint $table) {
        $table->id();
        $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
        $table->string('chemin');
        $table->boolean('est_principale')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_produits');
    }
};