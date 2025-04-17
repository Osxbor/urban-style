<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';
    protected $primaryKey = 'carrito_id';

    protected $fillable = [
        'usuario_id',
    ];

    protected $dates = [
        'fecha_creacion',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'usuario_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(ItemCarrito::class, 'carrito_id', 'carrito_id');
    }
}
