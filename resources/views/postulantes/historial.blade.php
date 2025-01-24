@extends('layouts.app')

@section('content')
    <h1>Historial de Postulaciones</h1>

    @if($vacantes->isEmpty())
        <p>No has postulado a ninguna vacante aún.</p>
    @else
        <ul>
            @foreach($vacantes as $vacante)
                <li>
                    <h2>{{ $vacante->titulo }}</h2>
                    <p>{{ $vacante->descripcion }}</p>
                    <p>Salario: ${{ $vacante->salario }}</p>
                    <p>Ubicación: {{ $vacante->ubicacion }}</p>
                    <p>Tipo de trabajo: {{ $vacante->tipo_trabajo }}</p>
                    <p>Fecha de postulación: {{ $vacante->pivot->created_at->format('d/m/Y') }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
