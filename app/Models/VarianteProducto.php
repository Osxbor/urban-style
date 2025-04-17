<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VarianteProducto extends Model
{
    use HasFactory;

    protected $table = 'variantes_producto';
    protected $primaryKey = 'variante_id';

    protected $fillable = [
        'producto_id',
        'talla_id',
        'color_id',
        'sku',
        'stock',
        'precio',
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'producto_id');
    }

    public function talla(): BelongsTo
    {
        return $this->belongsTo(Talla::class, 'talla_id', 'talla_id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id', 'color_id');
    }

    public function itemsCarrito(): HasMany
    {
        return $this->hasMany(ItemCarrito::class, 'variante_id', 'variante_id');
    }

    public function itemsPedido(): HasMany
    {
        return $this->hasMany(ItemPedido::class, 'variante_id', 'variante_id');
    }
}
