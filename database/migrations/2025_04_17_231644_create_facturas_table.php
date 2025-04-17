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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('factura_id');
            $table->foreignId('pedido_id')->constrained('pedidos', 'pedido_id');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->decimal('impuestos', 10, 2);
            $table->decimal('monto_total', 10, 2);
            $table->enum('estado', ['pagado', 'no_pagado', 'parcial'])->default('no_pagado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
