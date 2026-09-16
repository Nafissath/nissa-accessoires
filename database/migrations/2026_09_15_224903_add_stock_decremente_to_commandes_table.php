<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('commandes', 'stock_decremente')) {
            Schema::table('commandes', function (Blueprint $table) {
                $table->boolean('stock_decremente')->default(false)->after('statut_paiement');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('commandes', 'stock_decremente')) {
            Schema::table('commandes', function (Blueprint $table) {
                $table->dropColumn('stock_decremente');
            });
        }
    }
};