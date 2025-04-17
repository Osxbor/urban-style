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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('pago_id');
            $table->foreignId('factura_id')->constrained('facturas', 'factura_id');
            $table->decimal('monto', 10, 2);
            $table->string('metodo_pago', 50);
            $table->string('transaccion_id', 255)->nullable();
            $table->timestamp('fecha_pago')->useCurrent();
            $table->enum('estado', ['completado', 'pendiente', 'fallido'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
