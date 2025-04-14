@extends('layouts.gandy')

@section('css')
<link rel="stylesheet" href="{{ asset('/estilos/create.css') }}">
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Editar Vacante</h1>

    <form action="{{ route('vacantes.update', $vacante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $vacante->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $vacante->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Sueldo semanal</label>
            <input type="number" class="form-control" id="salario" name="salario" value="{{ old('salario', $vacante->salario) }}" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $vacante->ubicacion) }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo_trabajo" class="form-label">Tipo de trabajo</label>
            <input type="text" class="form-control" id="tipo_trabajo" name="tipo_trabajo" value="{{ old('tipo_trabajo', $vacante->tipo_trabajo) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Vacante</button>
    </form>
</div>
@endsection
