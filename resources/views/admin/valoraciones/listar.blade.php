@extends('layouts.header')

<div class="container mt-4">
    <div class="section">
    <a href="{{ route('admin-menu') }}" class="button is-link">Volver</a>
    <h1 class="title is-4 mb-4">Lista de Valoraciones</h1>
    <a href="{{ route('admin-valoraciones-crear') }}" class="button is-primary mb-3">Crear Valoración</a>

    @if (count($valoraciones) === 0)
        <p>No hay valoraciones disponibles.</p>
    @else
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
</div>

@extends('layouts.footer')
