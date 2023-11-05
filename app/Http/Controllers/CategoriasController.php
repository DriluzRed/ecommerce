<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json(['categorias' => $categorias, 'message' => 'Categorías obtenidas exitosamente']);
    }
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return response()->json(['categoria' => $categoria]);
    }

    public function productoCategoria($categoria){
        $productos = Producto::where('categoria_id', $categoria)->get();
        return response()->json(['categoria' => $categoria, 'productos' => $productos]);
    }

    public function StoreproductoCategoria(Request $request, $categoria){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria_id = $categoria;
        $producto->slug = Str::slug($request->nombre);
        $producto->save();
        return response()->json(['message' => 'Producto creado exitosamente', 'data' => $producto]);
    }

    public function updateproductoCategoria(Request $request, $categoria, $producto){
        $producto = Producto::find($producto);
        $producto->nombre = $request->nombre;

        $producto->precio = $request->precio;
        $producto->categoria_id = $categoria;
        $producto->slug = Str::slug($request->nombre);
        $producto->save();
        return response()->json(['message' => 'Producto actualizado exitosamente', 'data' => $producto]);
    }

    public function destroyproductoCategoria($categoria, $producto){
        $producto = Producto::find($producto);
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado exitosamente']);
    }

    public function showproductoCategoria($categoria, $producto){
        $producto = Producto::find($producto);
        return response()->json(['producto' => $producto]);
    }



    public function create()
    {
        return view('admin.categorias.crear');
    }
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->activo = ($request->activo == 'si' ? true : false);
        $categoria->color = $request->color;
        $categoria->slug = Str::slug($request->nombre);
        $categoria->save();
        return response()->json(['message' => 'Categoría creada exitosamente']);
    }
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('admin.categorias.editar')->with('categoria', $categoria);
    }
    public function update(Request $request, $id){
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->activo = ($request->activo == 'si' ? true : false);
        $categoria->color = $request->color;
        $categoria->slug = Str::slug($request->nombre);
        $categoria->save();
        return response()->json(['message' => 'Categoría actualizada exitosamente']);
    }
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria->productos()->count() > 0) {
            return response()->json(['error' => 'No se puede eliminar la categoría porque tiene productos asociados.']);
        }
        $categoria->delete();
        return response()->json(['message' => 'Categoría eliminada exitosamente']);
    }


}
