<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemPedido extends Model
{
    use HasFactory;

    protected $table = 'items_pedido';
    protected $primaryKey = 'item_pedido_id';

    protected $fillable = [
        'pedido_id',
        'variante_id',
        'nombre_producto',
        'talla',
        'color',
        'sku',
        'cantidad',
        'precio',
    ];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class, 'pedido_id', 'pedido_id');
    }

    public function variante(): BelongsTo
    {
        return $this->belongsTo(VarianteProducto::class, 'variante_id', 'variante_id');
    }
}
