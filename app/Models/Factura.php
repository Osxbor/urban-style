<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'factura_id';

    protected $fillable = [
        'pedido_id',
        'fecha_emision',
        'fecha_vencimiento',
        'impuestos',
        'monto_total',
        'estado',
    ];

    protected $dates = [
        'fecha_emision',
        'fecha_vencimiento',
    ];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class, 'pedido_id', 'pedido_id');
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'factura_id', 'factura_id');
    }
}
