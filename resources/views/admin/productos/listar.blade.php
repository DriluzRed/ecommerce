@extends('layouts.header')
<div class="container">
    <div class="section">
        <a href="{{ route('admin-menu') }}" class="button is-link">Volver</a>

        @if (count($productos) == 0)
        <h2 class="title is-size-4">No hay productos creados. ¿Quieres crear uno nuevo? Haz click <a href="{{ route('admin-productos-crear') }}" class="has-text-link">aquí</a>.</h2>
        @else
        <table class="table is-fullwidth">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th>Precio</th>
                    <th>Activo</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->slug }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->activo ? 'Si' : 'No' }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('admin-productos-editar', $producto->id) }}" class="button is-small is-link">Editar</a>
                        {{-- <a href="{{ route('admin-productos-eliminar', $producto->id) }}" class="button is-small is-danger">Eliminar</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin-productos-crear') }}" class="button is-link">Agregar</a>
        @endif
    </div>
</div>


@extends('layouts.footer')