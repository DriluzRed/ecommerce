@extends('layouts.header')

<div class="container">
    <div class="section">
        <h1 class="title is-size-2">Editar Producto</h1>
        <a href="{{ route('admin-productos') }}" class="button is-link">Volver</a>

        <form method="POST" action="{{ route('admin-productos-update', $producto->id) }}" class="box">
            @csrf
            <div class="field">
                <label for="nombre" class="label">Nombre</label>
                <div class="control">
                    <input type="text" name="nombre" id="nombre" class="input" value="{{ $producto->nombre }}" required>
                </div>
            </div>

            <div class="field">
                <label for="precio" class="label">Precio</label>
                <div class="control">
                    <input type="number" name="precio" id="precio" class="input" value="{{ $producto->precio }}">
                </div>
            </div>

            <div class="field">
                <label class="label">Activo</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="activo" id="activo-si" value="si" {{ $producto->activo === 'si' ? 'checked' : '' }}>
                        Si
                    </label>
                    <label class="radio">
                        <input type="radio" name="activo" id="activo-no" value="no" {{ $producto->activo === 'no' ? 'checked' : '' }}>
                        No
                    </label>
                </div>
            </div>

            <div class="field">
                <label for="categoria" class="label">Categoría</label>
                <div class="control">
                    <div class="select">
                        <select name="categoria_id" id="categoria" required>
                            <option value="" disabled>Selecciona una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $categoria->id === $producto->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@extends('layouts.footer')
