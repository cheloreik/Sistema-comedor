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
        Schema::table('familiares', function (Blueprint $table) {
            $table->foreignId('empleado_id')
                  ->constrained('empleados')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('familiares', function (Blueprint $table) {
            $table->dropForeign(['empleado_id']);
            $table->dropColumn('empleado_id');
        });
    }
    
};
