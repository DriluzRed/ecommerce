<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = [
        'nombre', 'slug', 'color', 'activo',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class);
    }
    
}
