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
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['empleado_id']);
                $table->dropColumn(['empleado_id','rol']);
        });

        Schema::table('users', function (Blueprint $table) {
            // 2. Agregar los nuevos campos
            $table->string('codigo')->unique()->after('id');
            $table->string('lastname')->after('name');
            $table->string('ci')->unique()->after('lastname');
            $table->string('telefono', 30)->nullable()->after('email');
            $table->string('area')->nullable()->after('telefono');
            $table->string('cargo')->nullable()->after('area');
            $table->date('fecha_ingreso')->nullable()->after('cargo');
            $table->decimal('credito_disponible', 10, 2)->default(0)->after('fecha_ingreso');
            $table->enum('rol', ['admin','empleado'])->default('empleado')->after('credito_disponible');
            $table->enum('estado', ['activo','inactivo'])->default('activo')->after('credito_disponible');
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
