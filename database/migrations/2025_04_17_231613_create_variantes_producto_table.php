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
        Schema::create('variantes_producto', function (Blueprint $table) {
            $table->id('variante_id');
            $table->foreignId('producto_id')->constrained('productos', 'producto_id');
            $table->foreignId('talla_id')->constrained('tallas', 'talla_id');
            $table->foreignId('color_id')->constrained('colores', 'color_id');
            $table->string('sku', 50)->unique();
            $table->integer('stock')->default(0);
            $table->decimal('precio', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variantes_producto');
    }
};
