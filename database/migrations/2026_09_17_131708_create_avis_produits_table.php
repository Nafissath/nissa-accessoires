<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('avis_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();
            $table->string('nom', 100);
            $table->string('email');
            $table->unsignedTinyInteger('note');
            $table->text('commentaire');
            $table->boolean('est_approuve')->default(false);
            $table->timestamps();

            // Un seul avis par email et par produit
            $table->unique(['produit_id', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avis_produits');
    }
};