@extends('layouts.header')

<div class="container mt-4">
    <h1 class="title is-4">Editar Valoración</h1>
    <a href="{{ route('admin-valoraciones') }}" class="button is-link is-small">Volver</a>

    <form method="POST" action="{{ route('admin-valoraciones-update', $valoracion->id) }}" class="mt-4">
        @csrf
        <div class="field">
            <label class="label">Producto</label>
            <div class="control">
                <div class="select">
                    <select name="producto_id" required>
                        <option value="" disabled>Selecciona un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" {{ $valoracion->producto_id == $producto->id ? 'selected' : '' }}>
                                {{ $producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Puntuación</label>
            <div class="control">
                <div class="radio-buttons">
                    @for ($i = 1; $i <= 5; $i++)
                        <label class="radio">
                            <input type="radio" name="puntuacion" value="{{ $i }}" required {{ $valoracion->puntuacion == $i ? 'checked' : '' }}>
                            {{ $i }}
                        </label>
                    @endfor
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Comentario</label>
            <div class="control">
                <textarea name="comentario" class="textarea" rows="4" required>{{ $valoracion->comentario }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary">Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>

@extends('layouts.footer')
