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
        Schema::table('reservas', function (Blueprint $table) {
            if (Schema::hasColumn('reservas', 'plato_id')) {
                $table->dropColumn('plato_id');
            }
            $table->foreignId('plato_id')
                  ->constrained('menus')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign(['plato_id']);
            $table->dropColumn('plato_id');
        });
    }
};
