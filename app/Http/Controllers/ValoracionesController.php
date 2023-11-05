<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Valoracion;
use Illuminate\Support\Str;

class ValoracionesController extends Controller
{
    public function index()
    {
        $valoraciones = Valoracion::all();
        return response()->json(['valoraciones' => $valoraciones]);
    }

    public function create()
    {
        $productos = Producto::all();
        return response()->json(['productos' => $productos]);
    }

    public function store(Request $request)
    {
        $valoracion = new Valoracion();
        $valoracion->producto_id = $request->producto_id;
        $valoracion->puntuacion = $request->puntuacion;
        $valoracion->comentario = $request->comentario;
        $valoracion->save();
        return response()->json(['message' => 'Valoración creada exitosamente']);
    }

    public function edit(Valoracion $valoracion)
    {
        $productos = Producto::all();
        return response()->json(['valoracion' => $valoracion, 'productos' => $productos]);
    }

    public function update(Request $request, Valoracion $valoracion)
    {
        $valoracion->producto_id = $request->producto_id;
        $valoracion->puntuacion = $request->puntuacion;
        $valoracion->comentario = $request->comentario;
        $valoracion->save();
        return response()->json(['message' => 'Valoración actualizada exitosamente']);
    }

    public function destroy(Valoracion $valoracion)
    {
        if ($valoracion->producto()->count() > 0) {
            return response()->json(['error' => 'No se puede eliminar la valoración porque tiene productos asociados.']);
        }
        $valoracion->delete();
        return response()->json(['message' => 'Valoración eliminada exitosamente']);
    }
}
