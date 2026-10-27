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

        $table->date('fecha');

        $table->integer('cupo_disponible');

        $table->string('plato_principal');

        $table->string('guarnicion');

        $table->string('ensalada');

        $table->string('bebida');

        $table->string('postre');

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
