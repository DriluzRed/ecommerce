<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;
class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.listar')->with('productos', $productos);
    }
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.crear')->with('categorias', $categorias);
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
        return redirect()->route('admin-productos');
    }
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('admin.productos.editar')
            ->with('producto', $producto)
            ->with('categorias', $categorias);
    }
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->slug = Str::slug($request->nombre);
        $producto->activo = ($request->activo == 'si' ? true : false);
        $producto->categoria_id = $request->categoria_id;
        $producto->save();
        return redirect()->route('admin-productos');
    }
    public function destroy(Producto $producto)
    {
        if ($producto->categoria()->count() > 0 || $producto->valoraciones()->count() > 0) {
            return back()->with('error', 'No se puede eliminar el producto porque tiene valoraciones o categorias asociados.');
        }
        $producto->delete();

        return redirect()->route('admin-productos');
    }
}
