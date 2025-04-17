<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talla extends Model
{
    use HasFactory;

    protected $table = 'tallas';
    protected $primaryKey = 'talla_id';

    protected $fillable = [
        'nombre',
        'tipo',
    ];

    public function variantes(): HasMany
    {
        return $this->hasMany(VarianteProducto::class, 'talla_id', 'talla_id');
    }
}
