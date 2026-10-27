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
    Schema::create('familiares', function (Blueprint $table) {
        $table->id();

        $table->foreignId('empleado_id')
              ->constrained('empleados')
              ->onDelete('cascade');

        $table->string('nombres');
        $table->string('apellidos');
        $table->string('ci');
        $table->string('parentesco');
        $table->date('fecha_nacimiento');
        $table->string('telefono')->nullable();
        $table->string('estado')->default('Activo');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiars');
    }
};
