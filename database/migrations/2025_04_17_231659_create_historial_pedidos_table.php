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
        Schema::create('historial_pedidos', function (Blueprint $table) {
            $table->id('historial_id');
            $table->foreignId('pedido_id')->constrained('pedidos', 'pedido_id');
            $table->foreignId('usuario_id')->constrained('usuarios', 'usuario_id');
            $table->timestamp('fecha_evento')->useCurrent();
            $table->enum('tipo_evento', ['creacion', 'estado', 'pago', 'envio']);
            $table->text('descripcion')->nullable();
            $table->string('detalle_estado', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_pedidos');
    }
};
