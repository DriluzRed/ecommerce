@extends('layouts.header')
<section class="section">
    <div class="container">
        <h1 class="title is-size-3">Menu Administrador</h1>
    </div>
</section>

<div class="card">
    <div class="card-content">
        <p class="title">
            <a href="{{ route('admin-categorias') }}" class="has-text-link">Categorías</a>
        </p>
        <p class="title">
            <a href="{{ route('admin-productos') }}" class="has-text-link">Productos</a>
        </p>
        <p class="title">
            <a href="{{ route('admin-valoraciones') }}" class="has-text-link">Valoraciones</a>
        </p>
    </div>
</div>
@extends('layouts.footer')