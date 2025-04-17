<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistorialPedido extends Model
{
    use HasFactory;

    protected $table = 'historial_pedidos';
    protected $primaryKey = 'historial_id';

    protected $fillable = [
        'pedido_id',
        'usuario_id',
        'tipo_evento',
        'descripcion',
        'detalle_estado',
    ];

    protected $dates = [
        'fecha_evento',
    ];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class, 'pedido_id', 'pedido_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'usuario_id');
    }
}
