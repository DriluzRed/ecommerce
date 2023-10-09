@extends('layouts.header')
<div class="container">
    <div class="section">
    <a href="{{ route('admin-menu') }}" class="button is-link">Volver</a>
        @if (count($categorias) == 0)
        <h2 class="title is-size-4">No hay categorías creadas. ¿Quieres crear una nueva categoría? Haz click <a href="{{ route('admin-categorias-crear') }}" class="has-text-link">aquí</a>.</h2>
        @else
        <table class="table is-fullwidth">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th>Color</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->slug }}</td>
                    <td>{{ $categoria->color }}</td>
                    <td>{{ $categoria->activo ? 'Si' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin-categorias-editar', $categoria->id) }}" class="button is-small is-link">Editar</a>
                        <a href="{{ route('admin-categorias-eliminar', $categoria->id) }}" class="button is-small is-danger">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@extends('layouts.footer')