@extends('layouts.gandy')

@section('css')
<link rel="stylesheet" href="{{ asset('/estilos/create.css') }}">
<style>
    .ver-cv-btn {
    font-size: 1rem; /* Fuente más pequeña */
    width: 40px;
    height: 40px;
    padding: 0.25rem 0.5rem; /* Reducir el padding para hacerlo más compacto */
}

</style>
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">{{ $vacante->titulo }}</h1>

    <div class="row">
        <!-- Columna principal para la vacante -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Descripción:</strong></p>
                    <p>{{ $vacante->descripcion }}</p>

                    <p><strong>Sueldo semanal:</strong> ${{ $vacante->salario }}</p>
                    <p><strong>Ubicación:</strong> {{ $vacante->ubicacion }}</p>
                    <p><strong>Tipo de Trabajo:</strong> {{ $vacante->tipo_trabajo }}</p>

                    <a href="#" class="btn btn-secondary mt-3">Editar</a>
                    <a href="#" class="btn btn-secondary mt-3">Eliminar</a>
                </div>
            </div>
        </div>

        <!-- Columna lateral para la info del empleador -->
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-header">
                    <strong>Información del Empleador</strong>
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $vacante->empleador->name }}</p>
                    <p><strong>Email:</strong> {{ $vacante->empleador->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
<h1 class="mb-4">Postulantes</h1>
@if($vacante->aplicaciones->isEmpty())
    <p>No hay postulantes aún para esta vacante.</p>
    @else
    <ul class="list-group">
    @foreach($vacante->aplicaciones as $aplicacion)
        <li class="list-group-item d-flex justify-content-between">
            <div>
                <strong>Nombre:</strong> {{ $aplicacion->user->name }} <br>
                <strong>Email:</strong> {{ $aplicacion->user->email }} <br>
            </div>
            <!-- Botón Ver CV con clase personalizada -->
            <a href="#" class="btn btn-info btn-sm ver-cv-btn">CV</a>
        </li>
    @endforeach
</ul>

@endif

</div>

@endsection
