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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id('direccion_id');
            $table->foreignId('usuario_id')->constrained('usuarios', 'usuario_id');
            $table->string('calle', 255);
            $table->string('ciudad', 100);
            $table->string('estado', 100)->nullable();
            $table->string('codigo_postal', 20);
            $table->string('pais', 100);
            $table->string('telefono', 20)->nullable();
            $table->boolean('principal')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
