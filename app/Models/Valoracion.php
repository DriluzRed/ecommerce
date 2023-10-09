<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    protected $table = 'valoraciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'producto_id',
        'usuario_id',
        'puntuacion',
        'comentario',
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
