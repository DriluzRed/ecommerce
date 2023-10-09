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
        return view('admin.valoraciones.listar')->with('valoraciones', $valoraciones);
    }

    public function create()
    {
        $productos = Producto::all();
        return view('admin.valoraciones.crear')->with('productos', $productos);
    }

    public function store(Request $request)
    {
        $valoracion = new Valoracion();
        $valoracion->producto_id = $request->producto_id;
        $valoracion->puntuacion = $request->puntuacion;
        $valoracion->comentario = $request->comentario;
        $valoracion->save();
        return redirect()->route('admin-valoraciones');
    }

    public function edit(Valoracion $valoracion)
    {
        $productos = Producto::all();
        return view('valoraciones.edit')
            ->with('valoracion', $valoracion)
            ->with('productos', $productos);
    }

    public function update(Request $request, Valoracion $valoracion)
    {
        $valoracion->producto_id = $request->producto_id;
        $valoracion->puntuacion = $request->puntuacion;
        $valoracion->comentario = $request->comentario;
        $valoracion->save();
        return redirect()->route('admin-valoraciones');
    }
    public function destroy(Valoracion $valoracion)
    {
        $valoracion->delete();
        return redirect()->route('admin-valoraciones');
    }
}
