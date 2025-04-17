<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    public $timestamps = false;

    protected $fillable = [
        'correo',
        'contrasena_hash',
        'rol_id',
        'nombre',
        'apellido',
        'ultimo_acceso',
    ];

    protected $dates = [
        'fecha_creacion',
        'fecha_actualizacion',
        'ultimo_acceso',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'rol_id', 'rol_id');
    }

    public function carritos(): HasMany
    {
        return $this->hasMany(Carrito::class, 'usuario_id', 'usuario_id');
    }

    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class, 'usuario_id', 'usuario_id');
    }

    public function direcciones(): HasMany
    {
        return $this->hasMany(Direccion::class, 'usuario_id', 'usuario_id');
    }
}
