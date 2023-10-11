@extends('layouts.header')

<div class="container mt-4">
    <div class="section">
    <a href="{{ route('admin-menu') }}" class="button is-link">Volver</a>
    <h1 class="title is-4 mb-4">Lista de Valoraciones</h1>

    @if (count($valoraciones) === 0)
    <a href="{{ route('admin-valoraciones-crear') }}" class="button is-primary mb-3">Crear Valoración</a>

    @else
    @if (session('success'))
    <div class="notification is-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="notification is-danger">
        {{ session('error') }}
    </div>
@endif

        <table class="table is-fullwidth">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Puntuación</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($valoraciones as $valoracion)
                    <tr>
                        <td>{{ $valoracion->producto->nombre }}</td>
                        <td>{{ $valoracion->puntuacion }}</td>
                        <td>{{ $valoracion->comentario }}</td>
                        <td>
                            <a href="{{ route('admin-valoraciones-editar', $valoracion->id) }}" class="button is-primary is-small">Editar</a>
                            <a href="{{ route('admin-valoraciones-eliminar', $valoracion->id) }}" class="button is-danger is-small">Eliminar</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{ route('admin-valoraciones-crear') }}" class="button is-primary mb-3">Crear Valoración</a>

    @endif
    </div>
</div>

@extends('layouts.footer')
