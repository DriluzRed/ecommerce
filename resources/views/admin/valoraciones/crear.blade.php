@extends('layouts.header')

<div class="container mt-4">
    <h1 class="title is-4">Crear Valoración</h1>
    <a href="{{ route('admin-valoraciones') }}" class="button is-link is-small">Volver</a>

    <form method="POST" action="{{ route('admin-valoraciones-store') }}" class="mt-4">
        @csrf

        <div class="field">
            <label class="label">Producto</label>
            <div class="control">
                <div class="select">
                    <select name="producto_id" required>
                        <option value="" disabled>Selecciona un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Puntuación</label>
            <div class="control">
                <div class="radio-buttons">
                    <label class="radio">
                        <input type="radio" name="puntuacion" value="1" required>
                        1
                    </label>
                    <label class="radio">
                        <input type="radio" name="puntuacion" value="2" required>
                        2
                    </label>
                    <label class="radio">
                        <input type="radio" name="puntuacion" value="3" required>
                        3
                    </label>
                    <label class="radio">
                        <input type="radio" name="puntuacion" value="4" required>
                        4
                    </label>
                    <label class="radio">
                        <input type="radio" name="puntuacion" value="5" required>
                        5
                    </label>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Comentario</label>
            <div class="control">
                <textarea name="comentario" class="textarea" rows="4" required></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary">Guardar Valoración</button>
            </div>
        </div>
    </form>
</div>

@extends('layouts.footer')
