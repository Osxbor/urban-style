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
        Schema::create('items_pedido', function (Blueprint $table) {
            $table->id('item_pedido_id');
            $table->foreignId('pedido_id')->constrained('pedidos', 'pedido_id');
            $table->foreignId('variante_id')->constrained('variantes_producto', 'variante_id');
            $table->string('nombre_producto', 255);
            $table->string('talla', 50);
            $table->string('color', 50);
            $table->string('sku', 50);
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_pedido');
    }
};
