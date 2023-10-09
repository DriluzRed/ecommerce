@extends('layouts.header')
<div class="container">
    <div class="section">
        <h1 class="title is-size-2">Crear Categoría</h1>
        <a href="{{ route('admin-categorias') }}" class="button is-link">Volver</a>

        <form method="POST" action="{{ route('admin-categorias-store') }}" class="form">
            @csrf

            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Nombre" name="nombre" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Color</label>
                <div class="control">
                    <div class="select">
                        <select name="color">
                            <option value="red">Rojo</option>
                            <option value="white">Blanco</option>
                            <option value="blue">Azul</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Activo</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="activo" value="si" required>
                        Sí
                    </label>
                    <label class="radio">
                        <input type="radio" name="activo" value="no" required>
                        No
                    </label>
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