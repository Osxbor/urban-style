<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colores';
    protected $primaryKey = 'color_id';

    protected $fillable = [
        'nombre',
        'codigo_hex',
    ];

    public function variantes(): HasMany
    {
        return $this->hasMany(VarianteProducto::class, 'color_id', 'color_id');
    }
}
