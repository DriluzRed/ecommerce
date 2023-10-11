<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.listar')->with('categorias', $categorias); 
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
        return redirect()->route('admin-categorias');
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
        return redirect()->route('admin-categorias');
    }
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria->productos()->count() > 0) {
            return back()->with('error', 'No se puede eliminar la categoría porque tiene productos asociados.');
        }
        $categoria->delete();
        return redirect()->route('admin-categorias');
    }

}
