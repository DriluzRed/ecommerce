<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Valoracion;
use Illuminate\Support\Str;
class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return response()->json(['productos' => $productos]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return response()->json(['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->slug = Str::slug($request->nombre);
        $producto->activo = ($request->activo == 'si' ? true : false);
        $producto->categoria_id = $request->categoria_id;
        $producto->save();
        return response()->json(['message' => 'Producto creado exitosamente']);
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return response()->json(['producto' => $producto, 'categorias' => $categorias]);
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->slug = Str::slug($request->nombre);
        $producto->activo = ($request->activo == 'si' ? true : false);
        $producto->categoria_id = $request->categoria_id;
        $producto->save();
        return response()->json(['message' => 'Producto actualizado exitosamente']);
    }

    public function destroy(Producto $producto)
    {
        if ($producto->categoria()->count() > 0 || $producto->valoraciones()->count() > 0) {
            return response()->json(['error' => 'No se puede eliminar el producto porque tiene valoraciones o categorías asociadas.']);
        }
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado exitosamente']);
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        // Obtener solo las valoraciones aprobadas del producto
        $valoracionesAprobadas = $producto->valoraciones()->where('aprobado', true)->get();

        // Retornar el producto y las valoraciones aprobadas en una respuesta JSON
        return response()->json([
            'producto' => $producto,
            'valoraciones' => $valoracionesAprobadas
        ]);
    }

    public function valoracionesProducto($id)
    {
        $producto = Producto::find($id);

        // Obtener las valoraciones aprobadas del producto
        $valoracionesAprobadas = $producto->valoraciones->where('aprobado', true);
        return response()->json(['valoraciones' => $valoracionesAprobadas]);
    }

    public function StorevaloracionesProducto(Request $request, Producto $producto)
    {
        $valoracion = new Valoracion();
        $valoracion->comentario = $request->comentario;
        $valoracion->puntuacion = $request->puntuacion;
        $valoracion->producto_id = $producto->id;
        $valoracion->save();
        return response()->json(['message' => 'Valoración creada exitosamente', 'data' => $valoracion]);
    }

    public function updatevaloracionesProducto(Request $request, Producto $producto, Valoracion $valoracion)
    {
        $valoracion->comentario = $request->comentario;
        $valoracion->puntuacion = $request->puntuacion;
        $valoracion->producto_id = $producto->id;
        $valoracion->aprobado = $request->aprobado;
        $valoracion->save();
        return response()->json(['message' => 'Valoración actualizada exitosamente', 'data' => $valoracion]);
    }

    public function destroyvaloracionesProducto(Producto $producto, Valoracion $valoracion)
    {
        $valoracion->delete();
        return response()->json(['message' => 'Valoración eliminada exitosamente']);
    }
}
