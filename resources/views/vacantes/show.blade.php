@extends('layouts.gandy')

@section('css')
<link rel="stylesheet" href="{{ asset('/estilos/create.css') }}">
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

                    <a href="#" class="btn btn-secondary mt-3">Postularme</a>
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
@endsection
