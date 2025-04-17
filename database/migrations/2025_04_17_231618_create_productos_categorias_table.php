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
        Schema::create('productos_categorias', function (Blueprint $table) {
            $table->foreignId('producto_id')->constrained('productos', 'producto_id');
            $table->foreignId('categoria_id')->constrained('categorias', 'categoria_id');
            $table->primary(['producto_id', 'categoria_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_categorias');
    }
};
