@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Vacante</h2>
        <form action="{{ route('vacantes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="salario">Salario</label>
                <input type="number" name="salario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipo_trabajo">Tipo de Trabajo</label>
                <select name="tipo_trabajo" class="form-control" required>
                    <option value="remoto">Remoto</option>
                    <option value="presencial">Presencial</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Publicar Vacante</button>
        </form>
    </div>
@endsection
