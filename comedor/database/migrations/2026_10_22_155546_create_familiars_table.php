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
        $table->unsignedBigInteger('empleado_id')->nullable();
        $table->string('nombres');
        $table->string('apellidos');
        $table->string('ci')->unique();
        $table->string('parentesco');
        $table->date('fecha_nacimiento');
        $table->string('telefono')->nullable();
        $table->enum('estado',['activo','inactivo'])->default('Activo');

        $table->timestamps();

        $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiares');
    }
};
