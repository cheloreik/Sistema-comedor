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
    Schema::create('menus', function (Blueprint $table) {

        $table->id();

        $table->date('fecha')->unique();
        $table->string('foto')->nullable();
        $table->string('plato');
        $table->text('descripcion')->nullable();
        $table->text('adicional')->nullable();

        $table->enum('estado', [
            'Borrador',
            'Publicado'
        ])->default('Borrador');

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
