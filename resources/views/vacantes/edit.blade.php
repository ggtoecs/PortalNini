@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Vacante</h1>
    <form action="{{ route('vacantes.update', $vacante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $vacante->titulo }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ $vacante->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="salario">Salario</label>
            <input type="number" name="salario" class="form-control" value="{{ $vacante->salario }}" required>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ $vacante->ubicacion }}" required>
        </div>

        <div class="form-group">
            <label for="tipo_trabajo">Tipo de Trabajo</label>
            <select name="tipo_trabajo" class="form-control" required>
                <option value="remoto" {{ $vacante->tipo_trabajo == 'remoto' ? 'selected' : '' }}>Remoto</option>
                <option value="presencial" {{ $vacante->tipo_trabajo == 'presencial' ? 'selected' : '' }}>Presencial</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Vacante</button>
    </form>
</div>
@endsection
