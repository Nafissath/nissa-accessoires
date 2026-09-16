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
    Schema::table('clientes', function (Blueprint $table) {
        if (!Schema::hasColumn('clientes', 'prenom')) {
            $table->string('prenom')->nullable();
        }
        if (!Schema::hasColumn('clientes', 'nom')) {
            $table->string('nom')->nullable();
        }
        if (!Schema::hasColumn('clientes', 'telephone')) {
            $table->string('telephone')->nullable()->unique();
        }
        if (!Schema::hasColumn('clientes', 'whatsapp')) {
            $table->string('whatsapp')->nullable();
        }
        if (!Schema::hasColumn('clientes', 'email')) {
            $table->string('email')->nullable();
        }
        if (!Schema::hasColumn('clientes', 'adresse')) {
            $table->text('adresse')->nullable();
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
};