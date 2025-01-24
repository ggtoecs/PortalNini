@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vacantes Publicadas</h1>
    <a href="{{ route('vacantes.create') }}" class="btn btn-primary">Crear Vacante</a>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Salario</th>
                <th>Ubicación</th>
                <th>Tipo de Trabajo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vacantes as $vacante)
            <tr>
                <td>{{ $vacante->titulo }}</td>
                <td>{{ $vacante->descripcion }}</td>
                <td>{{ $vacante->salario }}</td>
                <td>{{ $vacante->ubicacion }}</td>
                <td>{{ $vacante->tipo_trabajo }}</td>
                <td>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('vacantes.destroy', $vacante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta vacante?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
