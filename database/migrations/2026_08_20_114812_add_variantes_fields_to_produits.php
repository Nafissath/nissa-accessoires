<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Si nuances_couleurs n'existe pas encore
        if (!Schema::hasColumn('produits', 'nuances_couleurs')) {
            Schema::table('produits', function (Blueprint $table) {
                $table->string('nuances_couleurs')->nullable()->after('badge');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('produits', 'nuances_couleurs')) {
            Schema::table('produits', function (Blueprint $table) {
                $table->dropColumn('nuances_couleurs');
            });
        }
    }
};