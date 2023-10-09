@extends('layouts.header')
<section class="section">
    <div class="container">
        <h1 class="title">Sección 1 - <a href="{{ route('admin-menu') }}" class="has-text-link">Menú Admin</a></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="subtitle">Sección 2 - Nuevos Productos</h2>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="subtitle">Sección 3 - Nuevos Comentarios</h2>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="subtitle">Sección 4 - Todas las Categorías</h2>
    </div>
</section>

@extends('layouts.footer')