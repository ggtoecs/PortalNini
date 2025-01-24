@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vacantes Publicadas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Salario</th>
                <th>Ubicación</th>
                <th>Tipo de Trabajo</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
