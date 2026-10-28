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
            if (!Schema::hasColumn('reservas', 'reservable_id')) {
                $table->unsignedBigInteger('reservable_id');
            }

            if (!Schema::hasColumn('reservas', 'reservable_type')) {
                $table->string('reservable_type');
            }

            if (!Schema::hasColumn('reservas', 'fecha')) {
                $table->date('fecha');
            }
            

            if (!Schema::hasColumn('reservas', 'estado')) {
                $table->enum('estado', ['reservado', 'cancelado', 'entregado', 'no entregado', 'eliminado'])
                      ->default('reservado');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropColumn(['reservable_id', 'reservable_type', 'fecha', 'estado']);
        });
    }
};
